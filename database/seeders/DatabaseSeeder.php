<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Positions;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'level' => 1,
            'name' => 'Administrator',
            'username' => 'admin',
            'id_position' => '1',
            'id_job' => 'Pusat',
            'id_company' => 'MDH'
        ]);

        Positions::create([
            'position_name' => 'Staff IT'
        ]);

        Job::create([
            'job_no' => 'Pusat',
            'job_name' => 'Pusat',
            'job_status' => 'Pelaksanaan'
        ]);
    }
}
