@extends('layouts.app')

@section('content')
<h1>HPC Jobs</h1>

<table style="width:100%; border-collapse:collapse; margin-top:20px;">
    <thead>
        <tr style="background:#1e293b; color:white;">
            <th style="padding:10px; border:1px solid #ccc;">ID</th>
            <th style="padding:10px; border:1px solid #ccc;">Type</th>
            <th style="padding:10px; border:1px solid #ccc;">CPU Hours</th>
            <th style="padding:10px; border:1px solid #ccc;">Memory Usage</th>
            <th style="padding:10px; border:1px solid #ccc;">Status</th>
            <th style="padding:10px; border:1px solid #ccc;">Submitted</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jobs as $job)
            <tr>
                <td style="padding:10px; border:1px solid #ccc;">#{{ $job->id }}</td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $job->resource_type ?? 'N/A' }}</td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $job->cpu_hours ?? 0 }}</td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $job->memory_usage ?? 0 }}%</td>
                <td style="padding:10px; border:1px solid #ccc;">
                    <span style="padding: 2px 8px; border-radius: 12px; background: {{ $job->status == 'completed' ? '#dcfce7' : ($job->status == 'failed' ? '#fee2e2' : '#fef9c3') }}; color: {{ $job->status == 'completed' ? '#166534' : ($job->status == 'failed' ? '#991b1b' : '#ca8a04') }};">
                        {{ ucfirst($job->status ?? 'unknown') }}
                    </span>
                </td>
                <td style="padding:10px; border:1px solid #ccc;">{{ date('Y-m-d H:i', $job->created_at) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="padding:20px; text-align:center; border:1px solid #ccc;">No jobs found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
