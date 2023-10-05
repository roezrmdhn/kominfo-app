<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('user.index');
    }
    function admin()
    {
        return view('admin.index');
    }
    function superAdmin()
    {
        return view('superAdmin.index');
    }
}
