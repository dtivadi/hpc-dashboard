<!DOCTYPE html>
<html>
<head>
    <title>HPC Dashboard - Login</title>
    <style>
        body { background: #1e293b; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: Arial; }
        .login-box { background: white; padding: 40px; border-radius: 10px; width: 350px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
        h2 { color: #1e293b; margin-bottom: 20px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #1e293b; color: white; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px; font-size: 16px; }
        .error { color: #dc2626; font-size: 13px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>HPC Dashboard</h2>
        
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email (e.g., admin@hpc.com)" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        
        <p style="margin-top: 20px; font-size: 12px; color: #64748b;">
            Default credentials:<br>
            admin@hpc.com / password
        </p>
    </div>
</body>
</html>
