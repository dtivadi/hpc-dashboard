@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>Users</h1>
    @can('admin-only')
        <a href="{{ route('users.create') }}" style="background: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Add User</a>
    @endcan
</div>

@if(session('success'))
    <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 5px; margin-top: 20px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background: #fee2e2; color: #991b1b; padding: 10px; border-radius: 5px; margin-top: 20px;">
        {{ session('error') }}
    </div>
@endif

<table style="width:100%; border-collapse:collapse; margin-top:20px;">
    <thead>
        <tr style="background:#1e293b; color:white;">
            <th style="padding:10px; border:1px solid #ccc;">ID</th>
            <th style="padding:10px; border:1px solid #ccc;">Name</th>
            <th style="padding:10px; border:1px solid #ccc;">Email</th>
            <th style="padding:10px; border:1px solid #ccc;">Role</th>
            <th style="padding:10px; border:1px solid #ccc;">Joined</th>
            @can('admin-only')
                <th style="padding:10px; border:1px solid #ccc;">Actions</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td style="padding:10px; border:1px solid #ccc;">{{ $user->id }}</td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $user->name }}</td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $user->email }}</td>
                <td style="padding:10px; border:1px solid #ccc;">
                    <span style="padding: 2px 8px; border-radius: 12px; background: {{ $user->hasRole('Admin') ? '#fee2e2' : '#dcfce7' }}; color: {{ $user->hasRole('Admin') ? '#991b1b' : '#166534' }};">
                        {{ ucfirst($user->roles->first()?->name ?? 'None') }}
                    </span>
                </td>
                <td style="padding:10px; border:1px solid #ccc;">{{ $user->created_at->format('Y-m-d') }}</td>
                @can('admin-only')
                    <td style="padding:10px; border:1px solid #ccc; display: flex; gap: 10px;">
                        <a href="{{ route('users.edit', $user) }}" style="color: #2563eb; text-decoration: none;">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc2626; cursor: pointer; padding: 0;">Delete</button>
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
