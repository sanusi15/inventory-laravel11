<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Laptops;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index()
    {
        return view('qrcode.index')->with([
            'page_title' => 'Scan QR Code',
            'custom_js' => 'qrcode.js'
        ]);
    }

    public function show($code)
    {
        $tipe = substr($code, 0, 3);
        $realcode = substr($code, 3);        
        if($tipe == 'LTP'){
            $res = Laptops::with(['user', 'user.position'])->where('qr_code', $realcode)->first();
        }else{
            $res = Computer::with('user')->where('qr_code', $realcode)->first();
        }
        if($res != null){
            return view('qrcode.result')->with([
                'page_title' => 'Result',
                'data' => $res,
                'jenis' => $tipe == 'LTP' ? 'Laptop' : 'Computer'
            ]);
        }else{
            // abort('404', 'Invalid Code');
        }
    }
}
