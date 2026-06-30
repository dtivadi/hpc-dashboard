@extends('layouts.app')
@section('content')

<h1>Dashboard Overview</h1>

{{-- KPI Cards --}}
<div style="display:flex; gap:20px; margin-top:20px;">
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Total CPU Hours</p>
        <h2>{{ number_format($totalCpuHours) }}</h2>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Avg Memory Usage</p>
        <h2>{{ number_format($avgMemory, 1) }}%</h2>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Active Jobs</p>
        <h2>{{ $activeJobs }}</h2>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Total Revenue</p>
        <h2>${{ number_format($totalRevenue, 2) }}</h2>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- Row 1: CPU + Memory (Daily Trends) --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-right:24px;">
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1; max-width: 45%;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            CPU Usage Trend (Last 7 Days)
        </h3>
        <canvas id="cpuChart"></canvas>
    </div>
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1; max-width: 45%;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Memory Usage Trend (Last 7 Days)
        </h3>
        <canvas id="memoryChart"></canvas>
    </div>
</div>

{{-- Row 2: Active Jobs + Revenue --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-right:24px;">
    <div style="background:#fff; border-radius:10px; padding:20px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Active Jobs Trend (Last 7 Days)
        </h3>
        <canvas id="jobsChart"></canvas>
    </div>
    <div style="background:#fff; border-radius:10px; padding:20px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Monthly Revenue
        </h3>
        <canvas id="revenueChart"></canvas>
    </div>
</div>

<script>
// Daily Trends
const dailyLabels = {!! json_encode($dailyLabels) !!};
const dailyCpu = {!! json_encode($dailyCpu) !!};
const dailyMemory = {!! json_encode($dailyMemory) !!};
const dailyJobs = {!! json_encode($dailyJobs) !!};

// Monthly Financials
const financialLabels = {!! json_encode($financialLabels) !!};
const revenueSeries = {!! json_encode($revenueSeries) !!};

new Chart(document.getElementById('cpuChart'), {
    type: 'line',
    data: {
        labels: dailyLabels,
        datasets: [{
            label: 'Avg CPU Hours',
            data: dailyCpu,
            borderColor: '#2E74B5',
            backgroundColor: 'rgba(46,116,181,0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true } }
    }
});

new Chart(document.getElementById('memoryChart'), {
    type: 'line',
    data: {
        labels: dailyLabels,
        datasets: [{
            label: 'Avg Memory Usage (%)',
            data: dailyMemory,
            borderColor: '#E74C3C',
            backgroundColor: 'rgba(231,76,60,0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true, max: 100 } }
    }
});

new Chart(document.getElementById('jobsChart'), {
    type: 'bar',
    data: {
        labels: dailyLabels,
        datasets: [{
            label: 'Job Count',
            data: dailyJobs,
            backgroundColor: 'rgba(46,116,181,0.8)',
            borderColor: '#1F3864',
            borderWidth: 1,
            borderRadius: 4
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true,
                 title: { display: true, text: 'Number of Jobs' }}
        }
    }
});

new Chart(document.getElementById('revenueChart'), {
    type: 'bar',
    data: {
        labels: financialLabels,
        datasets: [{
            label: 'Revenue ($)',
            data: revenueSeries,
            backgroundColor: 'rgba(39,174,96,0.8)',
            borderColor: '#1e9e6b',
            borderWidth: 1,
            borderRadius: 4
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true,
                 title: { display: true, text: 'Revenue ($)' }}
        }
    }
});
</script>

{{-- Row 3: Job Status Doughnut --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-left:24px; margin-right:24px;">
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); max-width:350px;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Job Status Overview
        </h3>
        <canvas id="jobStatusChart"></canvas>
    </div>
</div>

<script>
const statusLabels = {!! json_encode($statusLabels) !!};
const statusCounts = {!! json_encode($statusCounts) !!};

new Chart(document.getElementById('jobStatusChart'), {
    type: 'doughnut',
    data: {
        labels: statusLabels,
        datasets: [{
            data: statusCounts,
            backgroundColor: [
                'rgba(39,174,96,0.8)',
                'rgba(46,116,181,0.8)',
                'rgba(243,156,18,0.8)',
                'rgba(231,76,60,0.8)',
                'rgba(142,68,173,0.8)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});
</script>

{{-- Row 4: CPU vs GPU Usage (Monthly) --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-left:24px; margin-right:24px; margin-bottom:32px;">
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1; max-width:70%;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Monthly Resource Utilization (CPU vs GPU Hours)
        </h3>
        <canvas id="cpuVsGpuChart"></canvas>
    </div>
</div>

<script>
const utilisationLabels = {!! json_encode($utilisationLabels) !!};
const cpuHoursSeries = {!! json_encode($cpuHoursSeries) !!};
const gpuHoursSeries = {!! json_encode($gpuHoursSeries) !!};

new Chart(document.getElementById('cpuVsGpuChart'), {
    type: 'bar',
    data: {
        labels: utilisationLabels,
        datasets: [
            {
                label: 'CPU Hours',
                data: cpuHoursSeries,
                backgroundColor: 'rgba(46,116,181,0.8)',
                borderRadius: 4
            },
            {
                label: 'GPU Hours',
                data: gpuHoursSeries,
                backgroundColor: 'rgba(142,68,173,0.8)',
                borderRadius: 4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' }},
        scales: {
            y: { beginAtZero: true,
                 title: { display: true, text: 'Hours' }}
        }
    }
});
</script>

@endsection
