@extends('layouts.app')

@section('content')
<h1>Edit User: {{ $user->name }}</h1>

<div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); max-width: 600px;">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('name') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('email') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Role</label>
            <select name="role" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                @foreach($roles as $role)
                    <option value="{{ $role }}" {{ old('role', $userRole) == $role ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
            @error('role') <span style="color: #dc2626; font-size: 12px; display: block;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px; border-top: 1px solid #eee; padding-top: 15px;">
            <p style="font-size: 14px; color: #64748b; margin-bottom: 10px;">Leave password blank if you don't want to change it.</p>
            <label style="display: block; margin-bottom: 5px;">New Password</label>
            <input type="password" name="password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('password') <span style="color: #dc2626; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Confirm New Password</label>
            <input type="password" name="password_confirmation" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Update User</button>
            <a href="{{ route('users.index') }}" style="background: #64748b; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection
