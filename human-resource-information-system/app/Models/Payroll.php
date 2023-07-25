<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'month', 'year', 'salary_paid', 'salary_cut'
    ];

    function employee() : BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
