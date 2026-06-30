<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>HPC Dashboard</title>
    <!--//<link rel="stylesheet" href="{{asset('css/style.css')}}>-->
    <style>
        .sidebar a {color: #cbd5e1;
        text-decoration:none;display:block;
    padding:12px 25px;}
    {margin:0;padding0}

    body{display: flex;min-height: 100vh;}
    .sidebar{width:250px; background-color: #1e293b; color: #fff position:fixed top 0;left0; height:100vh;}
   
.sidebar .navlinks li a {display:block padding:12px 25px; color:#cbd5e1;
text-decoration:none;}

.main-content{margin-left:250px; 
    padding:30px;}
    .sidebar li{margin:0;padding:0;}
</style>
</head>
<body>
	
<div class="sidebar">
<div class="logo" style="color:white; padding: 20px; font-weight: bold; border-bottom: 1px solid #334155;"> HPC Dashboard </div>
<ul class="nav-links" style="list-style: none; padding: 0;">
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('resources.index') }}">Resources</a></li>
<li><a href="{{ route('services.index') }}">Services</a></li>
<li><a href="{{ route('jobs') }}">Jobs</a></li>
<li><a href="{{ route('users.index') }}">Users</a></li>
<li><a href="{{ route('billing') }}">Billing</a></li>
<li><a href="{{ route('reports') }}">Reports</a></li>
<li><a href="{{ route('settings') }}">Settings</a></li>
<li style="margin-top: 20px; border-top: 1px solid #334155;">
    <form action="{{ route('logout') }}" method="POST" style="padding: 12px 25px;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #f87171; cursor: pointer; padding: 0; font-size: 16px; width: 100%; text-align: left;">Logout</button>
    </form>
</li>
</ul>
</div>
<div class="main-content">
@yield('content')
</div>
</body>
</html>