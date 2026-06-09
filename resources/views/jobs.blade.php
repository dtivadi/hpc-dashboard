@extends('layouts.app')
@section('content')
<h1>HPC Jobs</h1>
<table style="width:100%; border-collapse:collapse; margin-top:20px;">
<tr style="background:#1e293b; color:white;">
<th style="padding:10px; border:1px solid #ccc;">Job ID</th>
<th style="padding:10px; border:1px solid #ccc;">Submitted By</th>
<th style="padding:10px; border:1px solid #ccc;">Job Name</th>
<th style="padding:10px; border:1px solid #ccc;">Status</th>
<th style="padding:10px; border:1px solid #ccc;">CPU Hours</th>
<th style="padding:10px; border:1px solid #ccc;">Cost</th>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">JOB-001</td>
<td style="padding:10px; border:1px solid #ccc;">John Moyo</td>
<td style="padding:10px; border:1px solid #ccc;">Climate Simulation</td>
<td style="padding:10px; border:1px solid #ccc; color:green;">Running</td>
<td style="padding:10px; border:1px solid #ccc;">120</td>
<td style="padding:10px; border:1px solid #ccc;">$60</td>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">JOB-002</td>
<td style="padding:10px; border:1px solid #ccc;">Mazvita</td>
<td style="padding:10px; border:1px solid #ccc;">Data Analysis</td>
<td style="padding:10px; border:1px solid #ccc; color:green;">Running</td>
<td style="padding:10px; border:1px solid #ccc;">90</td>
<td style="padding:10px; border:1px solid #ccc;">$35</td>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">JOB-003</td>
<td style="padding:10px; border:1px solid #ccc;">Tadi Mutepfa</td>
<td style="padding:10px; border:1px solid #ccc;">Protein Folding</td>
<td style="padding:10px; border:1px solid #ccc; color:red;">Failed</td>
<td style="padding:10px; border:1px solid #ccc;">45</td>
<td style="padding:10px; border:1px solid #ccc;">$20</td>
</tr>
<tr>
<td style="padding:10px; border:1px solid #ccc;">JOB-004</td>
<td style="padding:10px; border:1px solid #ccc;">Mike Dube</td>
<td style="padding:10px; border:1px solid #ccc;">Molecular Dynamics</td>
<td style="padding:10px; border:1px solid #ccc; color:orange;">Queued</td>
<td style="padding:10px; border:1px solid #ccc;">0</td>
<td style="padding:10px; border:1px solid #ccc;">$0</td>
</tr>
</table>
@endsection

