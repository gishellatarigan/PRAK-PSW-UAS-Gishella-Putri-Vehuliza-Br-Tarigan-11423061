<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2cfcf;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            margin-top: 50px;
            color: #333;
            text-transform: uppercase;
        }
        form {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Choose Your Role</h2>
    <form action="{{ route('save.role') }}" method="POST">
        @csrf
        <label for="role">Select Role:</label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="pengelola">Pengelola</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
