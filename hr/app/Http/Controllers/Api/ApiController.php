<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected function responseSuccess($data = null, $message = null) {
        return response()->json([
            'data' => $data,
            'message' => $message
        ]);
    }

    protected function responseError($data = null, $message = '', $code = 500) {
        return response()->json([
            'data' => $data,
            'message' => $message
        ], $code);
    }
}
