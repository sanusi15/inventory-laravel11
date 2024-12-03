<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\EquipComputer;
use App\Models\Job;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;

class ComputerController extends Controller
{
    public function index()
    {
        return view('computer.index')->with([
            'page_title' => 'List of Computer',
            'computers' => Computer::with(['user'])->orderBy('id', 'desc')->get(),
            'custom_js' => 'computers.js',
        ]);
    }

    public function create($username = null)
    {
        return view('computer.create')->with([
            'page_title' => 'Add Computer',
            'users' => User::with(['position', 'job'])->get(),
            'jobs' => Job::all(), 
            'session_user' => $username != null ? User::where('username', Crypt::decryptString($username))->first() : null,
            'custom_js' => 'computers.js',
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'nominal_price' => str_replace(',', '', $request->nominal_price)
        ]);
        $request->validate([
            'merk' => ['required'],
            'type' => ['required'],
            'os' => ['required'],
            'processor' => ['required'],
            'ram' => ['required', 'numeric'],
            'status' => ['required'],
            'nominal_price' => ['numeric'],
            'monitor_merk' => ['required_if:sw_monitor,on'],
            'mouse_merk' => ['required_if:sw_mouse,on'],
            'keyboard_merk' => ['required_if:sw_keyboard,on'],
        ]);
        if($request->user_id)
        DB::beginTransaction();
        try{
            $data_computer = [
                'merk' => $request->merk,
                'type' => $request->type,
                'device_id' => $request->device_id,
                'product_id' => $request->product_id,
                'os' => $request->os,
                'ram' => $request->ram,
                'processor' => $request->processor,
                'storage_type_one' => $request->storage_type_one,
                'storage_capacity_one' => $request->storage_capacity_one,
                'storage_type_two' => $request->storage_type_two ?: null,
                'storage_capacity_two' => $request->storage_type_two ? $request->storage_capacity_two : null,
                'detail_spesification' => $request->detail_spesification,
                'purchase_date' => $request->purchase_date,
                'waranty_expiry' => $request->waranty_expiry,
                'nominal_price' => str_replace(',','', $request->nominal_price),
                'location' => $request->location,
                'password' => $request->password,
                'status' => $request->status,
                'information' => $request->information,
                'user_id' => $request->user_id ?: null
            ];
            $computer = Computer::create($data_computer);
            $equipments = [
                'monitor' => 'Monitor',
                'mouse' => 'Mouse',
                'keyboard' => 'Keyboard'
            ];
            foreach($equipments as $key => $jenis){
                $switch = 'sw_'.$key;
                $merk = $key.'_merk';
                $detail = $key.'_detail_spesification';
                $price = $key.'_nominal_price';
                $date = $key.'_purchase_date';
                if($request->$switch != null){
                    $request->validate([
                        $merk => ['required']
                    ]);
                    $data_equip = [
                        'computer_code' => $computer->code,
                        'jenis' => $jenis,
                        'merk' => $request->$merk,
                        'detail_spesification' => $request->$detail,
                        'nominal_price' => str_replace(',', '',$request->$price),
                        'purchase_date' => $request->$date,
                        'status' => 'In Use',
                    ];
                    EquipComputer::create($data_equip);
                }
            }
            DB::commit();
            return redirect()->route('computers')->with([
                'status_message' => 'success',
                'value_message' => 'Computer has been created'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('computers')->with([
                'status_message' => 'danger',
                'value_message' => 'Computer failed to be create'
            ]);
        }
    }
    public function edit(Computer $computer)
    {
        return view('computer.edit')->with([
            'page_title' => 'Edit Computer',
            'computer' => $computer->load(['user', 'equipComputer']),
            'users' => User::all(),
            'custom_js' => 'computers.js'
        ]);
    }

    public function update(Request $request, Computer $computer)
    {
        $request->merge([
            'nominal_price' => str_replace(',', '', $request->nominal_price),
        ]);
        $request->validate([
            'merk' => ['required'],
            'type' => ['required'],
            'os' => ['required'],
            'processor' => ['required'],
            'ram' => ['required', 'numeric'],
            'status' => ['required'],
            'nominal_price' => ['numeric'],
            'monitor_merk' => ['required_if:sw_monitor,on'],
            'mouse_merk' => ['required_if:sw_mouse,on'],
            'keyboard_merk' => ['required_if:sw_keyboard,on'],
        ]);
        DB::beginTransaction();
        try{
            $data_computer = [
                 'merk' => $request->merk,
                'type' => $request->type,
                'device_id' => $request->device_id,
                'product_id' => $request->product_id,
                'os' => $request->os,
                'ram' => $request->ram,
                'processor' => $request->processor,
                'storage_type_one' => $request->storage_type_one,
                'storage_capacity_one' => $request->storage_capacity_one,
                'storage_type_two' => $request->storage_type_two,
                'storage_capacity_two' => $request->storage_capacity_two,
                'detail_spesification' => $request->detail_spesification,
                'purchase_date' => $request->purchase_date,
                'waranty_expiry' => $request->waranty_expiry,
                'nominal_price' => str_replace(',','', $request->nominal_price),
                'location' => $request->location,
                'password' => $request->password,
                'status' => $request->status,
                'information' => $request->information,
            ];
            $computer->update($data_computer);
            $equipments = [
                'monitor' => 'Monitor',
                'mouse' => 'Mouse',
                'keyboard' => 'Keyboard'
            ];
            foreach($equipments as $key => $jenis){
                $code = $key.'_code';
                $switch = 'sw_'.$key;
                $merk = $key.'_merk';
                $detail = $key.'_detail_spesification';
                $price = $key.'_nominal_price';
                $date = $key.'_purchase_date';
                if($request->$switch != null){
                    $request->validate([
                        $merk => ['required']
                    ]);
                    $data_equip = [
                        'computer_code' => $computer->code,
                        'jenis' => $jenis,
                        'merk' => $request->$merk,
                        'detail_spesification' => $request->$detail,
                        'nominal_price' => str_replace(',', '',$request->$price),
                        'purchase_date' => $request->$date,
                        'status' => 'In Use',
                    ];
                    EquipComputer::updateOrCreate([
                        'code' => $request->$code
                    ],$data_equip);
                }
            }
            DB::commit();
            return redirect()->route('computers')->with([
                'status_message' => 'success',
                'value_message' => 'Computer updated'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->route('computers')->with([
                'status_message' => 'error',
                'value_message' => 'Computer failed to be create'
            ]);
        }
    }

    public function show(Computer $computer)
    {
        $computer = $computer->load(['user.position', 'user.job', 'equipComputer']);
        $path = Storage::disk('public')->path('qrcodes/computer/');
        if(!File::exists($path)){
            File::makeDirectory($path, 0755, true);
        }
        $qrcodePath = 'qrcodes/computer/computer_'.$computer->code.'.png';
        $base_url = config('app.url');
        QRCode::url($base_url.'/scanresult/COM'.$computer->qr_code)
            ->setOutFile(Storage::disk('public')->path($qrcodePath))
            ->png();
        return response()->json([
            'computer' => $computer,
            'qr_code_path' => asset('storage/'. $qrcodePath),
        ]);
    }

    public function destroy(Computer $computer)
    {
        $cekEquipment = EquipComputer::where('computer_code', $computer->code);
        if($cekEquipment->exists()){
            $cekEquipment->update(['computer_code' => null, 'status' => 'Available']);
        }
        $computer->delete();
        return redirect()->route('computers')->with([
            'status_message' => 'success',
            'value_message' => 'Computer deleted'
        ]);
    }
}
