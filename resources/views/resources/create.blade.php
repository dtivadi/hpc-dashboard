@extends('layouts.app')

@section('content')
<h1>Add Resource</h1>

<div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); max-width: 600px;">
    <form action="{{ route('resources.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Resource Name</label>
            <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('name') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Type (e.g., CPU, GPU, Storage)</label>
            <input type="text" name="type" value="{{ old('type') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('type') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px;">Capacity</label>
                <input type="number" name="capacity" value="{{ old('capacity') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                @error('capacity') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
            </div>
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px;">Unit (e.g., Cores, GB)</label>
                <input type="text" name="unit" value="{{ old('unit') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                @error('unit') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Save Resource</button>
            <a href="{{ route('resources.index') }}" style="background: #64748b; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection
