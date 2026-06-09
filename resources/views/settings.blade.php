@extends('layouts.app')

@section('content')

<h1>System Settings</h1>

<div style="max-width:800px; margin-top:20px;">

    <div style="background:white; padding:20px; border-radius:8px; margin-bottom:20px;">
        <h3>Dashboard Settings</h3>
        <hr>

        <label>Refresh Interval</label><br>
        <select style="width:100%; padding:10px; margin-top:5px;">
            <option>30 Seconds</option>
            <option selected>1 Minute</option>
            <option>5 Minutes</option>
        </select>
    </div>

    <div style="background:white; padding:20px; border-radius:8px; margin-bottom:20px;">
        <h3>Resource Cost Configuration</h3>
        <hr>

        <label>CPU Cost Per Hour ($)</label>
        <input type="number" value="0.50"
               style="width:100%; padding:10px; margin-bottom:10px;">

        <label>GPU Cost Per Hour ($)</label>
        <input type="number" value="2.00"
               style="width:100%; padding:10px; margin-bottom:10px;">

        <label>Memory Cost Per GB ($)</label>
        <input type="number" value="0.10"
               style="width:100%; padding:10px;">
    </div>

    <div style="background:white; padding:20px; border-radius:8px; margin-bottom:20px;">
        <h3>Chart Visibility</h3>
        <hr>

        <input type="checkbox" checked> CPU Usage Chart <br><br>
        <input type="checkbox" checked> Memory Usage Chart <br><br>
        <input type="checkbox" checked> Revenue Chart <br><br>
        <input type="checkbox" checked> Active Jobs Chart
    </div>

    <div style="background:white; padding:20px; border-radius:8px; margin-bottom:20px;">
        <h3>Notification Settings</h3>
        <hr>

        <input type="checkbox" checked> High CPU Usage Alerts <br><br>
        <input type="checkbox" checked> Low Resource Availability Alerts <br><br>
        <input type="checkbox"> Email Notifications
    </div>

    <button
        style="background:#2563eb; color:white; border:none; padding:12px 25px; border-radius:5px; cursor:pointer;">
        Save Settings
    </button>

</div>

@endsection