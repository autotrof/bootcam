<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class Controller1 extends Controller
{
    // MVC
    function index () {
        $karyawans = Karyawan::with('jabatan')->get();
        return view('contoh_view', compact('karyawans'));
    }
}
