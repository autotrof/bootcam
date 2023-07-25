<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 'name', 'birthdate', 'address', 'photo', 'phone', 'email'
    ];

    protected $appends = ['age'];

    function getAgeAttribute() {
        $now = new DateTime();
        $dob = new DateTime($this->birthdate);
        $diff = $now->diff($dob);
        return $diff->y;
    }

    function activeJobPosition() : HasOneThrough {
        return $this->hasOneThrough(JobPosition::class, EmployeeJobPosition::class)->where('employee_job_positions.is_active', true);
    }

    function pastJobPositions() : HasMany {
        return $this->hasMany(EmployeeJobPosition::class)->where('employee_job_positions.is_active', false);
    }
}
