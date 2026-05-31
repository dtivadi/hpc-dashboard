<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HpcSeeder extends Seeder
{
    public function run(): void
    {
        // ── USERS ─────────────────────────────────────────────────
        $users = [
            ['name' => 'Takudzwa Nhete',   'email' => 'takudzwa@hpc.ac.zw'],
            ['name' => 'Rudo Zvobgo',       'email' => 'rudo@hpc.ac.zw'],
            ['name' => 'Peter Moyo',        'email' => 'peter@hpc.ac.zw'],
            ['name' => 'Grace Banda',       'email' => 'grace@hpc.ac.zw'],
            ['name' => 'John Mutasa',       'email' => 'john@hpc.ac.zw'],
            ['name' => 'Sarah Chikwanda',   'email' => 'sarah@hpc.ac.zw'],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name'       => $user['name'],
                'email'      => $user['email'],
                'password'   => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // ── SERVICES ──────────────────────────────────────────────
        $services = [
            ['name' => 'CPU Compute'],
            ['name' => 'GPU Compute'],
            ['name' => 'Storage'],
            ['name' => 'Memory Allocation'],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // ── METRICS ───────────────────────────────────────────────
        for ($i = 30; $i >= 0; $i--) {
            DB::table('metrics')->insert([
                'cpu_usage'       => rand(55, 95),
                'memory_usage'    => rand(60, 90),
                'jobs_running'    => rand(10, 40),
                'jobs_queued'     => rand(2, 15),
                'jobs_completed'  => rand(20, 80),
                'created_at'      => Carbon::now()->subDays($i),
                'updated_at'      => Carbon::now()->subDays($i),
            ]);
        }

        // ── PAYMENTS ──────────────────────────────────────────────
        $userIds    = DB::table('users')->pluck('id')->toArray();
        $serviceIds = DB::table('services')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            DB::table('payments')->insert([
                'user_id'    => $userIds[array_rand($userIds)],
                'service_id' => $serviceIds[array_rand($serviceIds)],
                'amount'     => rand(200, 5000),
                'created_at' => Carbon::now()->subDays(rand(0, 180)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}