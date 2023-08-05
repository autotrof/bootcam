<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function loginPage() {
        return inertia('Login');
    }

    function loginCheck() {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(request()->only(['email', 'password']))) {
            return response()->json(true);
        }

        return response()->json("Email atau password tidak sesuai", 401);

    }
}
