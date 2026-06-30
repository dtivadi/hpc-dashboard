@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>HPC Resources</h1>
    @can('admin-only')
        <a href="{{ route('resources.create') }}" style="background: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Add Resource</a>
    @endcan
</div>

@if(session('success'))
    <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 5px; margin-top: 20px;">
        {{ session('success') }}
    </div>
@endif

<table style="width:100%; border-collapse:collapse; margin-top:20px;">
    <thead>
        <tr style="background:#1e293b; color:white;">
            <th style="padding:10px; border:1px solid #ccc;">Name</th>
            <th style="padding:10px; border:1px solid #ccc;">Type</th>
            <th style="padding:10px; border:1px solid #ccc;">Capacity</th>
            @can('admin-only')
                <th style="padding:10px; border:1px solid #ccc;">Actions</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @forelse($resources as $resource)
            <tr>
                <td style="padding:10px; border:1px solid #ccc;">{{ $resource->name }}</td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $resource->type }}</td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $resource->capacity }} {{ $resource->unit }}</td>
                @can('admin-only')
                    <td style="padding:10px; border:1px solid #ccc; display: flex; gap: 10px;">
                        <a href="{{ route('resources.edit', $resource) }}" style="color: #2563eb; text-decoration: none;">Edit</a>
                        <form action="{{ route('resources.destroy', $resource) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc2626; cursor: pointer; padding: 0;">Delete</button>
                        </form>
                    </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="4" style="padding:20px; text-align:center; border:1px solid #ccc;">No resources found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
