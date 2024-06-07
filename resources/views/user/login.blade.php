<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0d0d0;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 8px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #1abc9c;
        }
        .login-container p {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
        .login-container a {
            color: #2980b9;
            text-decoration: none;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
        .my-4 {
            margin: 2rem 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login User</h2>
        <form action="{{ route('user.login.submit') }}" method="POST"> 
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('user.register') }}">Register</a></p>
        <hr class="my-4">
        <p><a href="{{ route('choose_role') }}">Kembali</a></p>
    </div>
</body>
</html>
