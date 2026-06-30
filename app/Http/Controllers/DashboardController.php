<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $driver = DB::getDriverName();
        $isSqlite = $driver === 'sqlite';

        // Formatting strings based on DB driver
        $jobsMonthExpr = $isSqlite 
            ? "strftime('%Y-%m', created_at, 'unixepoch')" 
            : "DATE_FORMAT(FROM_UNIXTIME(created_at), '%Y-%m')";
        
        $jobsDayExpr = $isSqlite 
            ? "strftime('%Y-%m-%d', created_at, 'unixepoch')" 
            : "DATE_FORMAT(FROM_UNIXTIME(created_at), '%Y-%m-%d')";

        $paymentsMonthExpr = $isSqlite 
            ? "strftime('%Y-%m', created_at)" 
            : "DATE_FORMAT(created_at, '%Y-%m')";

        // -- CHART 1 -- Resource Utilisation (CPU vs GPU Hours) by Month
        $utilisationData = DB::table('jobs')
            ->selectRaw("$jobsMonthExpr as month,
                         SUM(CASE WHEN resource_type = 'CPU' THEN cpu_hours ELSE 0 END) as cpu_hours,
                         SUM(CASE WHEN resource_type = 'GPU' THEN cpu_hours ELSE 0 END) as gpu_hours")
            ->groupByRaw("month")
            ->orderByRaw("month")
            ->get();

        $utilisationLabels = $utilisationData->pluck('month');
        $cpuHoursSeries = $utilisationData->pluck('cpu_hours');
        $gpuHoursSeries = $utilisationData->pluck('gpu_hours');

        // -- CHART 2 -- Monthly Revenue
        $financialData = DB::table('payments')
            ->selectRaw("$paymentsMonthExpr as month,
                         SUM(amount) as revenue")
            ->groupByRaw("month")
            ->orderByRaw("month")
            ->get();

        $financialLabels = $financialData->pluck('month');
        $revenueSeries = $financialData->pluck('revenue');

        // -- CHART 3 -- Jobs by Status
        $jobStatusData = DB::table('jobs')
            ->selectRaw("status, COUNT(*) as count")
            ->groupBy('status')
            ->get();

        $statusLabels = $jobStatusData->pluck('status');
        $statusCounts = $jobStatusData->pluck('count');

        // -- DAILY TRENDS (Last 7 Days) --
        $dailyData = DB::table('jobs')
            ->selectRaw("$jobsDayExpr as day,
                         AVG(cpu_hours) as avg_cpu,
                         AVG(memory_usage) as avg_memory,
                         COUNT(*) as job_count")
            ->where('created_at', '>=', Carbon::now()->subDays(7)->timestamp)
            ->groupByRaw("day")
            ->orderBy('day')
            ->get();

        $dailyLabels = $dailyData->pluck('day')->map(function($date) {
            return Carbon::parse($date)->format('D');
        });
        $dailyCpu = $dailyData->pluck('avg_cpu');
        $dailyMemory = $dailyData->pluck('avg_memory');
        $dailyJobs = $dailyData->pluck('job_count');

        // KPI Totals
        $totalCpuHours = DB::table('jobs')->sum('cpu_hours');
        $avgMemory = DB::table('jobs')->avg('memory_usage') ?? 0;
        $activeJobs = DB::table('jobs')->where('status', 'running')->count();
        $totalRevenue = DB::table('payments')->sum('amount');

        return view('dashboard', compact(
            'utilisationLabels',
            'cpuHoursSeries',
            'gpuHoursSeries',
            'financialLabels',
            'revenueSeries',
            'statusLabels',
            'statusCounts',
            'dailyLabels',
            'dailyCpu',
            'dailyMemory',
            'dailyJobs',
            'totalCpuHours',
            'avgMemory',
            'activeJobs',
            'totalRevenue'
        ));
    }
}
