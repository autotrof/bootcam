<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $attendances = [];
            for ($i = 1; $i <= 30; $i++) {
                $attendances[] = [
                    'employee_id' => $employee->id,
                    'date' => date('Y-m-') . $i,
                    'in' => date('Y-m-') . $i . ' 08:00:00',
                    'out' => date('Y-m-') . $i . ' 17:00:00',
                    'status' => 1
                ];
            }
            Attendance::insert($attendances);
        }
    }
}
