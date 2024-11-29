<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangeDeviceController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipComputerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LaptopsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UserController;
use App\Models\EquipComputer;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'sign_in'])->name('signIn');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// start route laptop
Route::get('/laptop', [LaptopsController::class, 'index'])->name('laptops');
Route::get('/create_laptop/{username?}', [LaptopsController::class, 'create'])->name('create_laptop');
Route::post('/create_laptop', [LaptopsController::class, 'store'])->name('add_laptop');
Route::get('/edit_laptop/{laptop:code}', [LaptopsController::class, 'edit'])->name('edit_laptop');
Route::post('/edit_laptop/{laptop:code}', [LaptopsController::class, 'update'])->name('edit_laptop');
Route::get('/show_laptop/{laptop:code}', [LaptopsController::class, 'show'])->name('show_laptop');
Route::delete('/delete_laptop/{laptop:code}', [LaptopsController::class, 'destroy'])->name('delete_laptop');
// end route laptop

// start route laptop
Route::get('/computer', [ComputerController::class, 'index'])->name('computers');
Route::get('/create_computer/{username?}', [ComputerController::class, 'create'])->name('create_computer');
Route::post('/create_computer', [ComputerController::class, 'store'])->name('add_computer');
Route::get('/edit_computer/{computer:code}', [ComputerController::class, 'edit'])->name('edit_computer');
Route::post('/edit_computer/{computer:code}', [ComputerController::class, 'update'])->name('edit_computer');
Route::get('/show_computer/{computer:code}', [ComputerController::class, 'show'])->name('show_computer');
Route::delete('/delete_computer/{computer:code}', [ComputerController::class, 'destroy'])->name('delete_computer');
// end route laptop

// start route job
Route::get('/job', [JobController::class, 'index'])->name('jobs');
Route::post('/save_job', [JobController::class, 'store'])->name('save_job');
Route::get('/show_job/{job:job_no}', [JobController::class, 'show'])->name('show_job');
Route::post('/edit_job/{job:job_no}', [JobController::class, 'update'])->name('edit_job');
Route::delete('/delete_job/{job:job_no}', [JobController::class, 'destroy'])->name('delete_job');
// end route job

// start route position
Route::get('/position', [PositionsController::class, 'index'])->name('positions');
Route::post('/save_position', [PositionsController::class, 'store'])->name('save_position');
Route::get('/show_position/{position:id}', [PositionsController::class, 'show'])->name('show_position');
Route::post('/edit_position/{position:id}', [PositionsController::class, 'update'])->name('edit_position');
Route::delete('/delete_position/{position:id}', [PositionsController::class, 'destroy'])->name('delete_position');
// end route position

// start route user
Route::get('/user', [UserController::class, 'index'])->name('users');
Route::post('/save_user', [UserController::class, 'store'])->name('save_user');
Route::get('/show_user/{user:username}', [UserController::class, 'show'])->name('show_user');
Route::get('/select_device/{user:username}', [UserController::class, 'select_device'])->name('select_device');
// end route user

// Start route changeDevice
Route::get('/change_device/{encrypt_username}/{device}', [ChangeDeviceController::class, 'index'])->name('change_device');
Route::post('/save_changedevice', [ChangeDeviceController::class, 'chose'])->name('save_changedevice');
// End route changeDevice

// Start route EquipComputer
Route::get('/equip_computer/{code_computer?}', [EquipComputerController::class, 'index'])->name('equip_computer');
Route::post('/add_equip', [EquipComputerController::class, 'store'])->name('add_equip');
Route::get('/show_qrequip/{equip:code}', [EquipComputerController::class, 'generate_qr'])->name('show_qrequip');
Route::get('/show_equip/{jenis}', [EquipComputerController::class, 'show'])->name('show_equip');
Route::post('/change_equip', [EquipComputerController::class, 'change'])->name('change_equip');
// Route::post('/save_changedevice', [EquipComputer::class, 'chose'])->name('save_changedevice');
// End route EquipComputer

// start route Scan QR Code
Route::get('/scanqr', [QrCodeController::class, 'index'])->name('scanqr');
Route::get('/scanresult/{code}', [QrCodeController::class, 'show'])->name('scanresult');
// end route Scan QR Code