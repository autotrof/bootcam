<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends ApiController
{
    function index() {
        $data = Employee::join('job_positions', 'job_positions.id', '=', 'employees.job_position_id')
            ->select('employees.*', 'job_positions.title')
            ->paginate();

        return $this->responseSuccess($data);
    }
}
