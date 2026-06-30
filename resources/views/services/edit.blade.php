@extends('layouts.app')

@section('content')
<h1>Edit Service: {{ $service->name }}</h1>

<div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); max-width: 600px;">
    <form action="{{ route('services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Service Name</label>
            <input type="text" name="name" value="{{ old('name', $service->name) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('name') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Description</label>
            <textarea name="description" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; height: 100px;">{{ old('description', $service->description) }}</textarea>
            @error('description') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Price ($)</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('price') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Update Service</button>
            <a href="{{ route('services.index') }}" style="background: #64748b; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection
