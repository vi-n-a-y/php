<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }


        a{
            text-decoration: none;
            color:white;
        }
        h1{
            display: flex;
            justify-content: center;
            align-items: center;
            color:orange;
        }

        .button-div{
            margin-top:50px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        button{
            padding:5px 30px;
            color:white;
            font-weight: bold;
            background-color:orange;
            border: none;
        
        }
        .btn-div-1{
             /* background-color: blue; 
             border:1px solid black; */
            padding:50px 60px;
            display: flex;
            flex-direction: column;

        }
        h2{
            text-align: center;
        }
        
    </style>
</head>
<body>

    <h1>Welcome to the website</h1>
    <div class="button-div">
    <div class="btn-div-1">
        <h2>User Login</h2>
        <button><a href="login.php">Login</a></button>
    </div>
    <div class="btn-div-1">
        <h2>Admin Login</h2>
        <button>
        
        <a href="admin.php">Admin</a></button></div>
    <div class="btn-div-1">
        <h2>New User</h2>
        <button><a href="signup.php">SignUp</a></button></div>
    </div>
</body>
</html>