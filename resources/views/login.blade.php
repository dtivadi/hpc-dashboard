<<!DOCTYPE html>
<html>
<head>
<title>HPC Dashboard - Login</title>
<style>
body {
    background: #1e293b;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial;
}
.login-box {
    background: white;
    padding: 40px;
    border-radius: 10px;
    width: 350px;
    text-align: center;
}
h2 {
    color: #1e293b;
    margin-bottom: 20px;
}
input, select {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}
button {
    width: 100%;
    padding: 12px;
    background: #1e293b;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    font-size: 16px;
}
</style>
</head>
<body>
<div class="login-box">
<h2>HPC Dashboard</h2>
<form action="/dashboard" method="GET">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password">
<select name="role">
<option value="admin">Administrator</option>
<option value="it">IT Staff</option>
<option value="management">Management</option>
</select>
<button type="submit">Login</button>
</form>
</div>
</body>
</html>