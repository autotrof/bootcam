<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Attendance::where('employee_id', $request->user()->id)->orderBy('date', 'desc')->paginate(5);
        return $this->responseSuccess($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->merge([
            'employee_id' => $request->user()->id,
            'date' => date('Y-m-d'),
            'time' => date('Y-m-d H:i:s')
        ]);

        $attendance = Attendance::where('employee_id', $request->employee_id)
            ->where('date', $request->date)
            ->first();


        if (!empty($attendance)) {
            $attendance->fill([
                'out' => request('time'),
                'status' => 1
            ]);
        } else {
            $attendance = new Attendance([
                'employee_id' => $request->employee_id,
                'date' => request('date'),
                'in' => request('time'),
                'status' => 2
            ]);
        }
        $attendance->save();

        return $this->responseSuccess($attendance);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
