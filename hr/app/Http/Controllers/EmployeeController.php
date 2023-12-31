<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return inertia('Employee/Index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobPositions = JobPosition::all();
        return inertia('Employee/Form', compact('jobPositions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:\App\Models\Employee,nik',
            'name' => 'required',
            'birth_date' => 'required|date',
            'entry_date' => 'required|date',
            'phone' => 'required',
            'job_position_id' => 'required|exists:\App\Models\JobPosition,id',
            'photo_file' => 'required|image|max:2048'
        ]);

        DB::beginTransaction();
        $employee = Employee::create($request->except('photo_file'));
        $employee->photo = $request->file('photo_file')->store('employee/' . $employee->id, 'public');
        $employee->save();
        DB::commit();

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $jobPositions = JobPosition::all();
        return inertia('Employee/Form', compact('employee', 'jobPositions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nik' => 'required|unique:\App\Models\Employee,nik,' . $employee->id . ',id',
            'name' => 'required',
            'birth_date' => 'required|date',
            'entry_date' => 'required|date',
            'phone' => 'required',
            'job_position_id' => 'required|exists:\App\Models\JobPosition,id',
            'photo_file' => 'nullable|image|max:2048'
        ]);

        DB::beginTransaction();
        $employee->update($request->except('photo_file'));
        if ($request->file('photo_file')) {
            $employee->photo = $request->file('photo_file')->store('employee/' . $employee->id, 'public');
            $employee->save();
        }
        DB::commit();

        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        File::delete(storage_path('app/public/' . $employee->photo));
        $employee->delete();
        return response()->json(true);
    }
}
