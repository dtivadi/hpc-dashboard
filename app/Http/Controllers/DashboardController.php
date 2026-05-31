<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // -- CHART 1 -- Resource Utilisation (CPU vs GPU Hours)
        $utilisationData = DB::table('jobs')
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month,
                         SUM(CASE WHEN resource_type = 'CPU' THEN cpu_hours ELSE 0 END) as cpu_hours,
                         SUM(CASE WHEN resource_type = 'GPU' THEN cpu_hours ELSE 0 END) as gpu_hours")
            ->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")
            ->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")
            ->get();

        $utilisationLabels = $utilisationData->pluck('month');
        $cpuHoursSeries = $utilisationData->pluck('cpu_hours');
        $gpuHoursSeries = $utilisationData->pluck('gpu_hours');

        // -- CHART 2 -- Monthly Revenue
        $financialData = DB::table('payments')
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month,
                         SUM(amount) as revenue")
            ->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")
            ->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")
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

        // -- CHART 4 -- Temporarily disabled until we know the column name
        $topUsersLabels = collect([]);
        $topUsersSeries = collect([]);

        return view('dashboard', compact(
            'utilisationLabels',
            'cpuHoursSeries',
            'gpuHoursSeries',
            'financialLabels',
            'revenueSeries',
            'statusLabels',
            'statusCounts',
            'topUsersLabels',
            'topUsersSeries'
        ));
    }
}