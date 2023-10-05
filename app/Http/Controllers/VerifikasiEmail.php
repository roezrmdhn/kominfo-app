<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{


    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        // Lakukan pemeriksaan di database, misalnya
        $user = User::where('email', $email)->first();

        if ($user) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}
