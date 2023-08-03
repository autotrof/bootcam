<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobPositions = JobPosition::all();
        // return view('pages.job_position.index', compact('jobPositions'));
        return inertia('JobPosition/Index', compact('jobPositions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('pages.job_position.form');
        return inertia('JobPosition/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'level' => 'required|numeric',
            'salary' => 'required|numeric|min:1',
        ]);
        $jobPosition = JobPosition::create($request->only([
            'title', 'level', 'salary'
        ]));
        // return redirect()->back();
        return response()->json($jobPosition);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPosition $jobPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPosition $jobPosition)
    {
        // return view('pages.job_position.form', compact('jobPosition'));
        return inertia('JobPosition/Form', compact('jobPosition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobPosition $jobPosition)
    {
        $request->validate([
            'title' => 'required',
            'level' => 'required|numeric',
            'salary' => 'required|numeric|min:1'
        ]);
        $jobPosition->update($request->only([
            'title', 'level', 'salary'
        ]));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPosition $jobPosition)
    {
        $jobPosition->delete();
        // return redirect()->back();
        return response()->json(true);
    }
}
