<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6cece;
            color: #333;
        }
        .register-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .register-container h2 {
            margin-bottom: 20px;
        }
        .register-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .register-container input:focus {
            border-color: #2980b9;
            outline: none;
            box-shadow: 0 0 5px rgba(41, 128, 185, 0.5);
        }
        .register-container button {
            width: 100%;
            padding: 10px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .register-container button:hover {
            background-color: #1abc9c;
        }
        .register-container p {
            margin-top: 10px;
        }
        .register-container a {
            color: #2980b9;
            text-decoration: none;
        }
        .register-container a:hover {
            text-decoration: underline;
        }
        .my-4 {
            margin: 2rem 0;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="{{ route('user.register.submit') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="{{ route('user.login') }}">Login</a></p>
        <hr class="my-4">
        <p><a href="{{ route('choose_role') }}">Kembali</a></p>
    </div>
</body>
</html>
