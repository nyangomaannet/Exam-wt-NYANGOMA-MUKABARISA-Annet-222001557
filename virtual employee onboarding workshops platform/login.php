<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    .login-box {
        width: 300px;
        margin: 100px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .login-box h2 {
        margin-bottom: 20px;
        text-align: center;
    }
    .login-box input[type="text"],
    .login-box input[type="password"] {
        width: calc(100% - 40px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: block;
    }
    .login-box input[type="submit"] {
        width: 100%;
        background: #007bff;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    .login-box input[type="submit"]:hover {
        background: #0056b3;
    }
</style>
<script>
    function handleLogin(event) {
        event.preventDefault();
        const username = event.target.username.value;
        const password = event.target.password.value;

        // Mock login process - replace with actual authentication
        if (username === "user" && password === "password") {
            // Redirect to the dashboard
            window.location.href = "user dashboard.php";
        } else {
            alert("Invalid username or password");
        }
    }
</script>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <form onsubmit="handleLogin(event)">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
