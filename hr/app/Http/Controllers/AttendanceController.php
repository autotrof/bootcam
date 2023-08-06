<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Attendance/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return inertia('Attendance/Form', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'employee_id' => 'required|exists:\App\Models\Employee,id',
            'date' => 'required|date',
            'in' => 'nullable|date_format:yyyy-mm-dd HH:ii:ss',
            'out' => 'nullable|date_format:yyyy-mm-dd HH:ii:ss',
            'status' => 'required|in:0,1,2,3'
        ]);

        $attendnace = Attendance::create(request()->only([
            'employee_id', 'date', 'in', 'out', 'status'
        ]));

        return response()->json($attendnace);
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
        $employees = Employee::all();
        return inertia('Attendance/Form', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        request()->validate([
            'employee_id' => 'required|exists:\App\Models\Employee,id',
            'date' => 'required|date',
            'in' => 'nullable|date_format:yyyy-mm-dd HH:ii:ss',
            'out' => 'nullable|date_format:yyyy-mm-dd HH:ii:ss',
            'status' => 'required|in:0,1,2,3'
        ]);
        $attendance->update($request->only(['employee_id', 'date', 'in', 'out', 'status']));
        return response()->json($attendance);
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

    public function data() {
        $data = Attendance::join('employees', 'employees.id', '=', 'attendances.employee_id')
            ->select('attendances.*', 'employees.nik', 'employees.name');

        return DataTables::eloquent($data)
            ->filterColumn('name', function($query, $keyword) {
                $sql = "employees.name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('nik', function($query, $keyword) {
                $sql = "employees.nik like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->toJson();
    }
}
