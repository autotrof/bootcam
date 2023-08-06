<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Laravel\Sanctum\HasApiTokens;

class Employee extends User
{
    use HasFactory, HasApiTokens;

    protected $hidden = ['password'];

    protected $fillable = ['nik', 'name', 'birth_date', 'entry_date', 'phone', 'job_position_id', 'photo', 'password'];

    protected $casts = ['password' => 'hashed'];
}
