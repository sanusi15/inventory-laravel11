<?php

namespace App\Http\Controllers;

use App\Models\ChangeDevice;
use App\Models\Computer;
use App\Models\Laptops;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ChangeDeviceController extends Controller
{
    public function index($encrypt_username, $device)
    {
        $getAllDevice = $device == 'computer' ? Computer::where('status', 'Available')->get() : Laptops::where('status', 'Available')->get();
        try{
            return view('changedevice.index')->with([
                'page_title' => 'Please select the device',
                'data' => $getAllDevice,
                'id_encrypt' => $encrypt_username,
                'custom_js' => 'changedevice.js',
            ]);
        }catch(DecryptException $e){
            abort(404, 'Page not found');
        }
    }

    public function chose(Request $request)
    {
        try{
            $username = Crypt::decryptString($request->id_encrypt);
            $get_user = User::where('username', $username)->first();
            $code_device = $request->code;
            $uniqe_code = substr($code_device, 0, 3);
            $condition = $request->condition === 'true' ? 'Available' : 'Unavailable';
            if(!$get_user){
                return redirect()->back()->with([
                    'status_message' => 'error',
                    'value_message' => 'User not found'
                ]);
            }
            DB::beginTransaction();
            $getModel = $uniqe_code == 'COM' ? Computer::class : Laptops::class;
            $old_device = $getModel::where('user_id', $get_user->id)->first();
            if ($old_device) {
                $getModel::where('code', $old_device->code)->update([
                    'status' => $condition, 
                    'information' => 'Bekas dipakai oleh '.$get_user->name, 
                    'user_id' => NULL,
                ]);
                $dataHistoryChangeDevice = [
                    'user_id' => $get_user->id,
                    'device_code' => $old_device->code,
                    'type' => $uniqe_code == 'COM' ? 'Computer' : 'Laptop',
                    'reason' => $request->reason,
                    'date' => date('Y-m-d'),
                ];
                ChangeDevice::create($dataHistoryChangeDevice);
            }                
            $updated = $getModel::where('code', $code_device)->update([
                'status' => 'In Use', 'information' => 'Dipakai oleh ' . $get_user->name, 'user_id' => $get_user->id
            ]);
            if ($updated === 0) {
                DB::rollBack();
                return redirect()->back()->withErrors(['Device not found or update failed.']);
            }
            DB::commit();
            return redirect()->route('show_user', ['user' => $get_user->username])->with([
                'status_message' => 'success',
                'value_message' => 'Success change the device'
            ]);
        }catch(DecryptException $e){
            DB::rollBack();
            dd($e);
            abort(404, 'Page not found');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->withErrors(['An error occurred. Please try again.']);
        }
        
    }
}
