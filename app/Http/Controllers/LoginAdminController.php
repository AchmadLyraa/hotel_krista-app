<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function formLogin()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended(route('dashboard'));
    //         // return redirect()->intended(\route('dashboard'));
    //     }


    //     return back()->withErrors([
    //         'username' => 'Maaf, username atau password anda salah',
    //     ]);
    // }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        $errors = [
            'username' => 'Password Anda salah.'
        ];

        $user = Admin::where('username', $request->input('username'))->first();
        if (!$user) {
            $errors['username'] = 'Username tidak ditemukan.';
        }

        return redirect()->back()->withErrors($errors)->withInput();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
