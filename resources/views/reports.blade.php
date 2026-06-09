@extends('layouts.app')

@section('content')

<h1>System Reports</h1>

<div style="display:flex; gap:20px; margin-top:20px;">

    <div style="background:#1e293b; color:white; padding:20px; border-radius:8px; width:250px;">
        <h3>Resource Utilization</h3>
        <hr>
        <p>Total CPU Hours: <strong>12,450</strong></p>
        <p>Average CPU Usage: <strong>75%</strong></p>
        <p>Average Memory Usage: <strong>78%</strong></p>
        <p>GPU Utilization: <strong>67%</strong></p>
    </div>

    <div style="background:#1e293b; color:white; padding:20px; border-radius:8px; width:250px;">
        <h3>Job Statistics</h3>
        <hr>
        <p>Running Jobs: <strong>24</strong></p>
        <p>Completed Jobs: <strong>152</strong></p>
        <p>Queued Jobs: <strong>17</strong></p>
        <p>Failed Jobs: <strong>8</strong></p>
    </div>

    <div style="background:#1e293b; color:white; padding:20px; border-radius:8px; width:250px;">
        <h3>Financial Summary</h3>
        <hr>
        <p>Total Revenue: <strong>$6,500</strong></p>
        <p>Total Cost: <strong>$4,280</strong></p>
        <p>Net Income: <strong>$2,220</strong></p>
    </div>

</div>

<br><br>

<h2>Monthly Resource Report</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr style="background:#1e293b; color:white;">
        <th>Month</th>
        <th>CPU Usage (%)</th>
        <th>Memory Usage (%)</th>
        <th>Revenue ($)</th>
    </tr>

    <tr>
        <td>January</td>
        <td>65</td>
        <td>70</td>
        <td>4200</td>
    </tr>

    <tr>
        <td>February</td>
        <td>72</td>
        <td>75</td>
        <td>3800</td>
    </tr>

    <tr>
        <td>March</td>
        <td>85</td>
        <td>80</td>
        <td>5100</td>
    </tr>

    <tr>
        <td>April</td>
        <td>79</td>
        <td>78</td>
        <td>4700</td>
    </tr>

    <tr>
        <td>May</td>
        <td>88</td>
        <td>82</td>
        <td>5500</td>
    </tr>
</table>

<br>

<button onclick="window.print()"
style="background:#2563eb; color:white; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">
Print Report
</button>

@endsection