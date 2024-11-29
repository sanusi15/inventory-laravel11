<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function sign_in(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::where('username', $request->username)->first();

        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            return redirect()->route('dashboard')->with('login_success', 'Login berhasil');
        }else{
            return back()->withErrors([
                'login_failed' => 'Username atau password salah',
            ])->onlyInput('username');
        }

    }
}
