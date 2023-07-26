<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    const STATUS_ABSENT = 0;
    const STATUS_PRESENT = 1;
    const STATUS_SICK = 2;
    const STATUS_PAID_LEAVE = 3;
    const STATUS_ARRAY = [
        self::STATUS_ABSENT => 'Absent',
        self::STATUS_PRESENT => 'Present',
        self::STATUS_SICK => 'Sick',
        self::STATUS_PAID_LEAVE => 'Paid Leave',
    ];

    protected $fillable = [
        'date', 'employee_id', 'in', 'out', 'status', 'salary_cut'
    ];

    function employee() : BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
