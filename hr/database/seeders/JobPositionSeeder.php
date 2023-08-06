<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobPosition::insert([
            [
                'title' => 'Position 1',
                'level' => 1,
                'salary' => 3000000
            ],
            [
                'title' => 'Position 2',
                'level' => 2,
                'salary' => 4000000
            ],
            [
                'title' => 'Position 3',
                'level' => 3,
                'salary' => 5000000
            ],
            [
                'title' => 'Position 4',
                'level' => 4,
                'salary' => 5000000
            ],
        ]);
    }
}
