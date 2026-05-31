@extends('layouts.app')
@section('content')
<h1>HPC jobs</h1>
<table style="width:100%; border-collapse:collapse;margin-top:20px;">
<tr style="background:#1e293b;color:#fff;">
    <th style="padding:10px;>Job ID</th>"
    <th style="padding:10px;>User</th>"
    <th style="padding:10px;>Status</th>"
    <th style="padding:10px;>CPU Hours</th>"
    <th style="padding:10px;>Cost</th>"
</tr>
<tr>
   <td style="padding: 10px;JOB-001</td>" 
    <td style="padding: 10px;John</td>" 
        <td style="padding:10px;color:aqua;>Running</td>
        <td style="padding: 10px;120</td>" 
            <td style="padding: 10px;$60</td>" 
</tr>
<tr>
    <td style="padding: 10px;JOB-002</td>" 
    <td style="padding: 10px;Mazvita</td>" 
        <td style="padding:10px;color:aqua;>Running</td>
        <td style="padding: 10px;90</td>" 
            <td style="padding: 10px;$35</td>" 
</tr>
</table>
@endsection