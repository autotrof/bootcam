<?php

namespace App\Http\Controllers;

use App\Exports\ExportEmployee;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobPositions = JobPosition::all();
        return inertia('Employee/Index', compact('jobPositions'));
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
            'photo_file' => 'required|image|max:2048',
            'password' => 'required|string|min:6'
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
            'photo_file' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:6'
        ]);

        $employee->fill($request->except('photo_file', 'password'));
        if ($request->file('photo_file')) {
            $employee->photo = $request->file('photo_file')->store('employee/' . $employee->id, 'public');
        }
        if (!empty($request->password)) {
            $employee->password = $request->password;
        }
        $employee->save();

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

    private function queryEmployee() {
        $data = Employee::join('job_positions', 'job_positions.id', '=', 'employees.job_position_id')
            ->select('employees.*', 'job_positions.title');

        if (!empty(request('job_position_id'))) {
            $data->where('employees.job_position_id', request('job_position_id'));
        }

        if (!empty(request('entry_date.0')) && !empty(request('entry_date.1'))) {
            $data->whereBetween('entry_date', request('entry_date'));
        }

        //$data masih berupa query, bukan hasil query
        return $data;
    }

    public function data() {
        $data = $this->queryEmployee();

        return DataTables::eloquent($data)
            ->filterColumn('title', function($query, $keyword) {
                $sql = "job_positions.title like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })->make();
    }

    function export() {
        $data = $this->queryEmployee();
        $hasil = $data->get();

        return Excel::download(new ExportEmployee($hasil), 'employee.xlsx');
    }
}
