<?php

namespace App\Http\Controllers;

use App\Models\EquipComputer;
use App\Models\Job;
use App\Models\Laptops;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;

class LaptopsController extends Controller
{
    public function index()
    {
        return view('laptop.index')->with([
            'page_title' => 'List of Laptops',
            'laptops' => Laptops::with(['user'])->orderBy('id', 'desc')->get(),
            'custom_js' => 'laptops.js'
        ]);
    }

    public function create($username = null)
    {
        return view('laptop.create')->with([
            'page_title' => 'Add Laptop',
            'users' => User::with(['position', 'job'])->get(),
            'jobs' => Job::all(),
            'session_user' => $username != null ? User::where('username', Crypt::decryptString($username))->first() : null,
            'custom_js' => 'laptops.js'
        ]);        
    }

    public function store(Request $request)
    {
        $request->merge([
            'nominal_price' => str_replace(',', '', $request->nominal_price)
        ]);
        $request->validate([
            'merk' => ['required'],
            'os' => ['required'],
            'processor' => ['required'],
            'ram' => ['required', 'numeric'],
            'status' => ['required'],
            'nominal_price' => ['numeric'],
            'monitor_merk' => ['required_if:sw_monitor,on'],
            'mouse_merk' => ['required_if:sw_mouse,on'],
        ]);
        DB::beginTransaction();
        try{
            $data_laptop = [
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
            $laptop = Laptops::create($data_laptop);
            $equipments = [
                'mouse' => 'Mouse',
                'monitor' => 'Monitor'
            ];
            foreach($equipments as $key => $jenis){
                $switch = 'sw_'.$key;
                $merk = $key.'_merk';
                $detail = $key.'_detail_spesification';
                $price = $key.'_nominal_price';
                $date = $key.'_purchase_date';
                if($request->$switch != null){
                    $data_equip = [
                        'computer_code' => $laptop->code,
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
            return redirect()->route('laptops')->with([
                'status_message' => 'success',
                'value_message' => 'Laptop has been created'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('add_laptop')->with([
                'status_message' => 'error',
                'value_message' => $e->getMessage()
            ]);
        }
    }

    public function edit(Laptops $laptop)
    {
        return view('laptop.edit', [
            'page_title' => 'Edit data laptop',
            'laptop' => $laptop->load(['user', 'equipComputer']),
            'users' => User::all(),
            'custom_js' => 'laptops.js',
        ]);
    }

    public function update(Request $request, Laptops $laptop)
    {
        $request->merge([
            'nominal_price' => str_replace(',', '', $request->nominal_price)
        ]);
        $request->validate([
            'merk' => ['required'],
            'os' => ['required'],
            'processor' => ['required'],
            'ram' => ['required', 'numeric'],
            'status' => ['required'],
            'nominal_price' => ['numeric'],
            'monitor_merk' => ['required_if:sw_monitor,on'],
            'mouse_merk' => ['required_if:sw_mouse,on'],
        ]);
        DB::beginTransaction();
        try{
            $data_laptop = [
                'merk' => $request->merk,
                'type' => $request->type,
                'device_id' => $request->device_id,
                'product_id' => $request->product_id,
                'os' => $request->os,
                'ram' => $request->ram,
                'processor' => $request->processor,
                'storage_type_one' => $request->storage_type_one,
                'storage_capacity_one' => $request->storage_capacity_one,
                'storage_type_two' => $request->storage_type_two !== 'Empty' ? $request->storage_type_two : null,
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
            $laptop->update($data_laptop);
            $equipments = [
                'mouse' => 'Mouse',
                'monitor' => 'Monitor'
            ];
            foreach($equipments as $key => $jenis){
                $code = $key.'_code';
                $switch = 'sw_'.$key;
                $merk = $key.'_merk';
                $detail = $key.'_detail_spesification';
                $price = $key.'_nominal_price';
                $date = $key.'_purchase_date';
                if($request->$switch != null){
                    $data_equip = [
                        'jenis' => $jenis,
                        'merk' => $request->$merk,
                        'detail_spesification' => $request->$detail,
                        'nominal_price' => str_replace(',', '',$request->$price),
                        'purchase_date' => $request->$date,
                        'status' => 'In Use',
                        'computer_code' => $laptop->code
                    ];
                    EquipComputer::updateOrCreate([
                        'code' => $request->$code
                    ],$data_equip);
                }
            }
            DB::commit();
            return redirect()->route('laptops')->with([
                'status_message' => 'success',
                'value_message' => 'Computer has been created'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with([
                'status_message' => 'error',
                'value_message' => $e->getMessage()
            ]);
        }
    }

    public function show(Laptops $laptop)
    {
        $laptop->load(['user.position', 'user.job', 'equipComputer']);
        $path = Storage::disk('public')->path('qrcodes/laptop/');
        if(!File::exists($path)){
            File::makeDirectory($path, 0755, true);
        }
        $qrcodePath = 'qrcodes/laptop/laptop_'.$laptop->code.'.png';
        $base_url = config('app.url');
        QRCode::url($base_url.'/scanresult/'.$laptop->qr_code)
            ->setOutFile(Storage::disk('public')->path($qrcodePath))
            ->png();

        return response()->json([
            'laptop' => $laptop,
            'user' => $laptop->user,
            'qr_code_path' => asset('storage/' . $qrcodePath),
        ]);
    }

    public function destroy(Laptops $laptop)
    {
        $cekEquipment = EquipComputer::where('computer_code', $laptop->code);
        if($cekEquipment->exists()){
            $cekEquipment->update(['computer_code' => null, 'status' => 'Available']);
        }
        $laptop->delete();
        return redirect()->route('laptops')->with([
            'status_message' => 'success',
            'value_message' => 'Laptop deleted'
        ]);
    }

}
