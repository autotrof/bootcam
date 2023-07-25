<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJobPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_position_id', 'employee_id', 'is_active', 'start_date', 'promotion_test_at', 'end_date'
    ];
}
