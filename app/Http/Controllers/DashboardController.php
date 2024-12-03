<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Laptops;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'laptop_count' => Laptops::count(),
            'computer_count' => Computer::count(),
            'printer_count' => 8,
            'proyektor_count' => 4,
            'custom_js' => 'apexcharts.init.js'
        ];
        return view('dashboard.index')->with($data);
    }
}
