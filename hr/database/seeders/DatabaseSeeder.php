<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::firstOrCreate([
            'email' => 'test@example.com',
        ],
        [
            'name' => 'Test User',
            'password' => bcrypt('123456')
        ]);

        $this->call(JobPositionSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(AttendanceSeeder::class);
    }
}
