<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Metric;

class MetricSeeder extends Seeder
{
    public function run()
    {
        // Create 20 sample records
        for ($i = 0; $i < 20; $i++) {
            Metric::create([
                'cpu_usage' => rand(20, 90),          // Random CPU %
                'memory_usage' => rand(30, 95),       // Random memory %
                'jobs_running' => rand(5, 50),        // Random running jobs
                'jobs_queued' => rand(0, 20),         // Random queued jobs
                'jobs_completed' => rand(50, 200),    // Random completed jobs
            ]);
        }
    }
}