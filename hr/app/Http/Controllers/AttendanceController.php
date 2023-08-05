<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
        return inertia('Attendance/Index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('pages.job_position.form');
        return inertia('Attendance/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'level' => 'required|numeric',
        //     'salary' => 'required|numeric|min:1',
        // ]);
        // $jobPosition = Attendance::create($request->only([
        //     'title', 'level', 'salary'
        // ]));
        // return redirect()->back();
        return response()->json($jobPosition);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $jobPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        return inertia('Attendance/Form', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $jobPosition)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'level' => 'required|numeric',
        //     'salary' => 'required|numeric|min:1'
        // ]);
        // $jobPosition->update($request->only([
        //     'title', 'level', 'salary'
        // ]));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        // return redirect()->back();
        return response()->json(true);
    }
}
