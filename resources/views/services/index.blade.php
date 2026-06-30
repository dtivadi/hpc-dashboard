@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>Available Services</h1>
    @can('admin-only')
        <a href="{{ route('services.create') }}" style="background: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Add Service</a>
    @endcan
</div>

@if(session('success'))
    <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 5px; margin-top: 20px;">
        {{ session('success') }}
    </div>
@endif

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 24px;">
    @forelse($services as $service)
        <div style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); display: flex; flex-direction: column;">
            <h3 style="margin: 0 0 10px 0; color: #1e293b;">{{ $service->name }}</h3>
            <p style="color: #64748b; font-size: 14px; flex-grow: 1;">{{ $service->description }}</p>
            <div style="margin-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                <span style="font-weight: bold; font-size: 18px; color: #1e293b;">${{ number_format($service->price, 2) }}</span>
                @can('admin-only')
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('services.edit', $service) }}" style="color: #2563eb; text-decoration: none; font-size: 14px;">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc2626; cursor: pointer; padding: 0; font-size: 14px;">Delete</button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    @empty
        <p>No services available.</p>
    @endforelse
</div>
@endsection
