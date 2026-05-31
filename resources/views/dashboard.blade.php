@extends('layouts.app')
@section('content')

<h1>Dashboard Overview</h1>

{{-- KPI Cards --}}
<div style="display:flex; gap:20px; margin-top:20px;">
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Total CPU Hours</p>
        <h2>12,450</h2>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Memory Usage</p>
        <h2>78%</h2>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Active Jobs</p>
        <h2>24</h2>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>Total Cost</p>
        <h2>$4,280</h2>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:8px; width:200px;">
        <p>GPU Utilisation</p>
        <h2>67%</h2>
        <p style+"font-size:12px; opacity:0.7; margin-top:4px;">Avg this week</p>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- Row 1: CPU + Memory --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-right:24px;">
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1; max-width: 45%;;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            CPU Usage Trend
        </h3>
        <canvas id="cpuChart"></canvas>
    </div>
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1; max-width: 45%;;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Memory Usage Trend
        </h3>
        <canvas id="memoryChart"></canvas>
    </div>
</div>

{{-- Row 2: Active Jobs + Revenue --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-right:24px;">
    <div style="background:#fff; border-radius:10px; padding:20px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Active Jobs This Week
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

{{-- All chart scripts --}}
<script>
new Chart(document.getElementById('cpuChart'), {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'CPU Usage (%)',
            data: [65, 72, 68, 85, 79, 60, 75],
            borderColor: '#2E74B5',
            backgroundColor: 'rgba(46,116,181,0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true, max: 100 } }
    }
});

new Chart(document.getElementById('memoryChart'), {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Memory Usage (%)',
            data: [70, 75, 80, 78, 82, 74, 77],
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
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Active Jobs',
            data: [18, 24, 30, 22, 28, 15, 10],
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
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Revenue ($)',
            data: [4200, 3800, 5100, 4700, 5600, 4280],
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
new Chart(document.getElementById('jobStatusChart'), {
    type: 'doughnut',
    data: {
        labels: ['Completed', 'Running', 'Queued', 'Failed'],
        datasets: [{
            data: [65, 24, 8, 3],
            backgroundColor: [
                'rgba(39,174,96,0.8)',
                'rgba(46,116,181,0.8)',
                'rgba(243,156,18,0.8)',
                'rgba(231,76,60,0.8)'
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
{{-- Row 4: GPU Usage --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-left:24px; margin-right:24px; margin-bottom:32px;">
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); flex:1; max-width:45%;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            GPU Utilisation Trend
        </h3>
        <canvas id="gpuChart"></canvas>
    </div>
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); max-width:350px;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            CPU vs GPU Usage
        </h3>
        <canvas id="cpuVsGpuChart"></canvas>
    </div>
</div>

<script>
new Chart(document.getElementById('gpuChart'), {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'GPU Utilisation (%)',
            data: [45, 60, 75, 90, 85, 50, 65],
            borderColor: '#8E44AD',
            backgroundColor: 'rgba(142,68,173,0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true, max: 100,
                 title: { display: true, text: 'Utilisation (%)' }}
        }
    }
});

new Chart(document.getElementById('cpuVsGpuChart'), {
    type: 'bar',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
            {
                label: 'CPU (%)',
                data: [65, 72, 68, 85, 79, 60, 75],
                backgroundColor: 'rgba(46,116,181,0.8)',
                borderRadius: 4
            },
            {
                label: 'GPU (%)',
                data: [45, 60, 75, 90, 85, 50, 65],
                backgroundColor: 'rgba(142,68,173,0.8)',
                borderRadius: 4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' }},
        scales: {
            y: { beginAtZero: true, max: 100,
                 title: { display: true, text: 'Usage (%)' }}
        }
    }
});
</script>
{{-- Cost vs Revenue --}}
<div style="display:flex; gap:16px; margin-top:24px; margin-left:24px; margin-right:24px;">
    <div style="background:#fff; border-radius:10px; padding:16px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08); max-width:500px;">
        <h3 style="margin:0 0 16px 0; font-size:15px; color:#1e293b;">
            Cost vs Revenue (Monthly)
        </h3>
        <canvas id="costRevenueChart"></canvas>
    </div>
</div>

<script>
new Chart(document.getElementById('costRevenueChart'), {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [
            {
                label: 'Revenue ($)',
                data: [4200, 3800, 5100, 4700, 5600, 4280],
                backgroundColor: 'rgba(39,174,96,0.8)',
                borderRadius: 4
            },
            {
                label: 'Cost ($)',
                data: [3100, 3200, 3400, 3300, 3600, 3200],
                backgroundColor: 'rgba(231,76,60,0.8)',
                borderRadius: 4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' }},
        scales: {
            y: { beginAtZero: true,
                 title: { display: true, text: 'Amount ($)' }}
        }
    }
});
</script>
@endsection