<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="welcome-container">
        <h1>Welcome</h1> 

        <div class="button-container">
            <label for="signup-button">New User?</label>
            <button id="signup-button" onclick="location.href='signup.php'">Sign Up</button>
        </div>

        <div class="button-container">
            <label for="login-button">User Login?</label>
            <button id="login-button" onclick="location.href='login.php'">Login</button>
        </div>

        <div class="button-container">
            <label for="admin-button">Admin?</label>
            <button id="admin-button" class="admin" onclick="location.href='admin.php'">Admin</button>
        </div>
    </div>
</body>

</html>