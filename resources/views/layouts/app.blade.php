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
<div class="logo" style="color:white"> HPC  Dashboard </div>
<ul class="nav-links">
<li><a href="{{ url('resources')}}>Resource Usage</a></li>
<li><a href="{{ url ('/jobs')}}> Jobs</a></li>
<li><a href="{{ url('/users') }}">Users</a></li>
<li><a href="{{ url('/billing') }}">Billing</a></li>
<li><a href="{{ url('/reports') }}">Reports</a></li>
<li><a href="{{ url('/settings') }}">Settings</a></li>
</ul>
</div>
<div class="main-content">
@yield('content')
</div>
</body>
</html>