<?php

namespace App\Http\Controllers;

use App\Models\ChangeDevice;
use App\Models\EquipComputer;
use App\Models\Job;
use App\Models\Positions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index')->with([
            'page_title' => 'List of User',
            'users' => User::with(['position'])->get(),
            'positions' => Positions::all(),
            'jobs' => Job::all(),
            'custom_js' => 'user.js'
        ]);
    }

    public function show(User $user)
    {
        return view('user.show')->with([
            'page_title' => 'Detail User',
            'user' => $user->load(['position','computer', 'laptop']),
            'history_device' => ChangeDevice::where('user_id', $user->id)->with('computer')->get(),
            'id_encrypt' => Crypt::encrypt($user->id),
            'custom_js' => 'user.js'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'position' => ['required'],
            'location' => ['required'],
        ]);

        $data_user = [
            'level' => 0,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_position' => $request->position,
            'id_job' => $request->location,
            'id_company' => 'MDH',
        ];
        $user = User::where('username', $request->username);
        if($user->exists()){
            return redirect()->back()->with([
                'status_message' => 'error',
                'value_message' => 'Username is already!'
            ]);
        }
        User::create($data_user);
        return redirect()->back()->with([
            'status_message' => 'success',
            'value_message' => 'User has been created'
        ]);
    }

    // public function select_device(User $user)
    // {
    //     Session::put(['session_user' => $user]);
    //     return redirect()->route('add_computer');
    // }
}
