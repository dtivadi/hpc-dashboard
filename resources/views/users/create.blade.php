@extends('layouts.app')

@section('content')
<h1>Add User</h1>

<div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); max-width: 600px;">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('name') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('email') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Role</label>
            <select name="role" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Password</label>
            <input type="password" name="password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('password') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Confirm Password</label>
            <input type="password" name="password_confirmation" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Save User</button>
            <a href="{{ route('users.index') }}" style="background: #64748b; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection
