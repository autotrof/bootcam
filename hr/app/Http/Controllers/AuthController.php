<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    function loginPage() {
        Inertia::setRootView('guest');
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


    function logout() {
        Auth::logout();
        redirect()->route('login');
    }
}
