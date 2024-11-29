<?php

namespace App\Http\Controllers;

use App\Models\ChangeDevice;
use App\Models\Computer;
use App\Models\EquipComputer;
use App\Models\Laptops;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use LaravelQRCode\Facades\QRCode;

class EquipComputerController extends Controller
{
    public function index($code_computer = null)
    {
        if($code_computer){
            $cekData = EquipComputer::where(['computer_code' => $code_computer]);
            if(!$cekData->exists()){
                abort('404');
            };
            $pageTitle =  'List of equipment used in this device';
            $getData = $cekData->get();
            $isChangeEquip = true;
        }else{
            $pageTitle = 'List of equipment';
            $getData = EquipComputer::orderBy('created_at', 'desc')->get();
            $isChangeEquip = false;
        }
        return view('equip.index')->with([
            'page_title' => $pageTitle,
            'data' => $getData,
            'isChangeEquip' => $isChangeEquip,
            // 'listEquip' => EquipComputer::where('status', 'Available')->get(),
            'custom_js' => 'equipdevice.js',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'merk' => 'required',
            'purchase_date' => 'required',
            'nominal_price' => 'required',
            'status' => 'required',
        ]);
        $data_equip = [
            'jenis' => $request->type,
            'merk' => $request->merk,
            'detail_spesification' => $request->detail_spesification,
            'nominal_price' => str_replace(',', '', $request->nominal_price),
            'purchase_date' => $request->purchase_date,
            'status' => $request->status,
        ];
        EquipComputer::create($data_equip);
        return redirect()->route('equip_computer')->with([
            'status_message' => 'success',
            'value_message' => 'Data has been created'
        ]);
    }


    public function change(Request $request)
    {
        $request->validate([
            'condition' => 'required',
            'equipselect' => 'required',
            'old_equipcode' => 'required',
            'computer_code' => 'required',
        ]);
        $condition = $request->condition == 'true' ? 'Available' : 'Unavailable';
        try{
            DB::beginTransaction();
            EquipComputer::where('code', $request->old_equipcode)->update(['status' => $condition, 'computer_code' => null]);
            EquipComputer::where('code', $request->equipselect)->update(['status' => 'In Use', 'computer_code' => $request->computer_code]);
            $ModelDevice = substr($request->computer_code, 0, 3) == 'COM' ? Computer::class : Laptops::class;
            $DataUser = $ModelDevice::where('code', $request->computer_code)->first();
            $historyChangeDevice = [
                'type' => $request->type,
                'user_id' => $DataUser->user_id,
                'device_code' => $request->old_equipcode,
                'reason' => $request->reason,
                'date' => date('Y-m-d')
            ];
            ChangeDevice::create($historyChangeDevice);
            DB::commit();
            $getUser = User::where('id', $DataUser->user_id)->first();
            return redirect()->route('show_user', ['user' => $getUser->username]);
        }catch(Exception $e){
            DB::rollback();
            dd($e);
        }
    }

    public function generate_qr(EquipComputer $equip)
    {
        $path = Storage::disk('public')->path('qrcodes/equipdevice');
        if(!File::exists($path)){
            File::makeDirectory($path, 0755, true);
        }
        $qrcodePath = 'qrcodes/equipdevice/equip_'.$equip->code.'.png';
        $base_url = config('app.url');
        QRCode::url($base_url.'/'.$equip->code)
            ->setOutFile(Storage::disk('public')->path($qrcodePath))
            ->png();
        return response()->json([
            'qr_code_path' => asset('storage/'.$qrcodePath)
        ]);
    }

    public function show($jenis = null)
    {
        $getData = EquipComputer::where(['jenis' => $jenis, 'status' => 'Available'])->get();
        return response()->json($getData);
    }
}
