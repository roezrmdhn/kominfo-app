<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'telephone' => 'required|min:10|max:14',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:1|max:16'
        ]);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successful!! Please login');
        return redirect('/login')->with('success', 'Registrasi berhasil!! Silahkan login.');
    }
}
