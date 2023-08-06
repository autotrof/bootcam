<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    // model dimiripkan dengan modal user
    // config/auth.php
    // di authentication controller perlu ditambahkan guard('providernya')
    public function loginCheck() {
        request()->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('employee')->attempt(request()->only(['nik', 'password']))) {
            $token = Auth::guard('employee')->user()->createToken('employee-auth')->plainTextToken;
            return $this->responseSuccess([
                'token' => $token,
                'profile' => Auth::guard('employee')->user()
            ]);
        }

        return $this->responseError(null, "nik atau password tidak sesuai", 401);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return $this->responseSuccess();
    }
}
