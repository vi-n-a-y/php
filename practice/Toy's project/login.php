<?php
    session_start();

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password1 = $_POST['password'];

        
       



        include_once 'db_connect.php';


        $stmt = $conn->prepare("SELECT id,password1 FROM customers WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
       

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($dbId, $hashedPassword);
            $stmt->fetch();


            if (password_verify($password1, $hashedPassword)) {
                // echo "successfull ";

               

                $_SESSION['dbId'] = $dbId;



                header('location: home.php');
                exit();
            } else {
                echo "Invalid password<br>";
            }
        } else {
            echo "inncorrect email address<br>";
        }
        $stmt->close();
        $conn->close();
    }


    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>


<style>
      body {
            background: url('images/teddy_bear_2.avif') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
 
        .form-container {
            background: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            padding-left:35px;
        }
        .kids-form h1 {
            color: #ff5722;
            /* Bright, playful color for the header */
            text-align: center;
            font-size: 2rem;
        }

        .kids-form input {
            width: 94%;
            padding: 10px;
            color:black;

            margin-top: 15px;
            border: 2px solid #ff5722;
            border-radius: 5px;
            font-size: 1rem;
            background-color: whitesmoke;
            opacity: 0.8;
            
        }
        .kids-form button {
            width: 94%;
            padding: 10px;
            border: none;
            background-color: #ff5722;
            /* Fun and bright button color */
            color: white;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top:15px;
        }
</style>



<body>
<div class="form-container">
        <form class="kids-form" id="login-form" method="post" enctype="multipart/form-data">
            <h1>Login</h1>

            
            <input type="email" id="email" name="email" class="required" placeholder="Email">
            <span id="emailError" class="error-message"></span>


            <div class="password-container">
                <input type="password" name="password" id="password" class="required" placeholder="Password">
                <!-- <i id="togglePassword" class="fa fa-eye"></i> -->
                <span id="passwordError" class="error-message"></span>
            </div>

            <button name="submit">Submit</button>

        </form>
</div>  

</body>
</html>