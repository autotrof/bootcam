<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContohController extends Controller
{
    function index() {
        $data = [
            'nama' => 'Budi',
            'kelas' => 10
        ];
        return inertia('Home', $data);
    }

    function about() {
        return inertia('Contact');
    }

    function contact() {
        return inertia('About');
    }

    function store() {}
    function update() {}
    function delete() {}
}
