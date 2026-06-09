@extends('layouts.app')
@section('content')
<h1>Users</h1>
<a href="/users/create" class="btn btn-primary">
Add User</a>
<br><br>
<table></table>
<table style="width:100%; border-collapse:collapse; margin-top:20px;">
<tr style="background:#1e293b; color:white;">
<th style="padding:10px; border:1px solid #ccc;">User ID</th>
<th style="padding:10px; border:1px solid #ccc;">Name</th>
<th style="padding:10px; border:1px solid #ccc;">Role</th>
<th style="padding:10px; border:1px solid #ccc;">Department</th>
<th style="padding:10px; border:1px solid #ccc;">Status</th>
<th style="padding:10px; border:1px solid #ccc;">Date Joined</th>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">USR-001</td>
<td style="padding:10px; border:1px solid #ccc;">John Moyo</td>
<td style="padding:10px; border:1px solid #ccc;">Researcher</td>
<td style="padding:10px; border:1px solid #ccc;">Physics</td>
<td style="padding:10px; border:1px solid #ccc; color:green;">Active</td>
<td style="padding:10px; border:1px solid #ccc;">2024-01-15</td>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">USR-002</td>
<td style="padding:10px; border:1px solid #ccc;">Sarah Ncube</td>
<td style="padding:10px; border:1px solid #ccc;">Admin</td>
<td style="padding:10px; border:1px solid #ccc;">IT Services</td>
<td style="padding:10px; border:1px solid #ccc; color:green;">Active</td>
<td style="padding:10px; border:1px solid #ccc;">2023-06-20</td>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">USR-003</td>
<td style="padding:10px; border:1px solid #ccc;">Mike Dube</td>
<td style="padding:10px; border:1px solid #ccc;">Researcher</td>
<td style="padding:10px; border:1px solid #ccc;">Chemistry</td>
<td style="padding:10px; border:1px solid #ccc; color:red;">Inactive</td>
<td style="padding:10px; border:1px solid #ccc;">2023-09-10</td>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">USR-004</td>
<td style="padding:10px; border:1px solid #ccc;">Tadi Mutepfa</td>
<td style="padding:10px; border:1px solid #ccc;">IT Staff</td>
<td style="padding:10px; border:1px solid #ccc;">IT Services</td>
<td style="padding:10px; border:1px solid #ccc; color:green;">Active</td>
<td style="padding:10px; border:1px solid #ccc;">2024-03-01</td>
</tr>
</table>
@endsection

