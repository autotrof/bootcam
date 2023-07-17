<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ContohController extends Controller
{
function index() {
    $students = Student::limit(100)->get();

    if (request('page') == 1) {
        return view('pages.page1', compact('students'));
    } else {
        return view('pages.page2', compact('students'));
    }
}

function store() {}
function update() {}
function delete() {}
}
