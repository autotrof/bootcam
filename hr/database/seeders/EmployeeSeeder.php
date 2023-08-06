<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobPositionIds = JobPosition::pluck('id')->toArray();

        $employees = [];
        $defaultFakeImage = fake()->image(storage_path('app/public'), 640, 480, 'face', false, true, 'default face');
        $password = bcrypt('123456');
        for ($i = 0; $i <= 30; $i++) {
            $employees[] = [
                'nik' => fake('id_ID')->nik(),
                'name' => fake('id_ID')->name(),
                'birth_date' => fake()->date('Y-m-d', '2000-12-31'),
                'entry_date' => fake()->date('Y-m-d', 'now'),
                'phone' => fake('id_ID')->biasedNumberBetween(992839483212, 999999999999),
                'job_position_id' => fake()->randomElement($jobPositionIds),
                'photo' => $defaultFakeImage,
                'password' => $password,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        Employee::insert($employees);
    }
}
