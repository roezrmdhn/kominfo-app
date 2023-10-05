<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $infoLogin = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($infoLogin)) {
            // $request->session()->regenerate();
            // return redirect()->intended('admin');
            if (Auth::user()->role == 'user') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('admin/admin');
            } elseif (Auth::user()->role == 'super admin') {
                return redirect('admin/superAdmin');
            }
        } else {
            return back()->with('loginError', 'Password atau Username Salah!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
