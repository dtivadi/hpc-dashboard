<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HpcSeeder extends Seeder
{
    public function run(): void
    {
        // Add 7 days of sample data
        for ($i = 6; $i >= 0; $i--) {
            DB::table('hpc_metrics')->insert([
                'cpu_usage' => rand(55, 95),
                'memory_usage' => rand(60, 90),
                'jobs_running' => rand(10, 40),
                'jobs_queued' => rand(2, 15),
                'jobs_completed' => rand(20, 80),
                'created_at' => Carbon::now()->subDays($i),
                'updated_at' => Carbon::now()->subDays($i),
            ]);
        }
        
        $this->command->info('Added 7 days of HPC metrics data!');
    }
}