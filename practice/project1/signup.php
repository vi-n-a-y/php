<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="login-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
            <input type="text" name="firstName" id="firstName" placeholder="Enter your First Name" required>
            <input type="text" name="lastName" id="lastName" placeholder="Enter your Last Name" required>
            <input type="email" name="email" id="email" placeholder="Enter your Email" required>
            <input type="password" name="password" id="Password" placeholder="Enter your Password" required>
            <input type="password" name="conPassword" id="conPassword" placeholder="Confirm password" required>

            <input type="submit" value="submit" name="submit">
        </form>
        <div class="forgot-password">
            <a href="login.php">Already Login?</a>

        </div>
    </div>



    <?php
    if (isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        // $password1=$_POST['password'];


        // echo $firstName."<br>";
        // echo $lastName."<br>";
        // echo $email."<br>";
        // echo $_POST['password']."<br>";
        $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);


        include_once 'db_connect.php';



        $stmt = $conn->prepare("INSERT INTO signup (firstName,lastName,email,password) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password1);



        if ($stmt->execute()) {
            // echo "Inserted successfully";
            // header("Location : login.php");
            // exit();





            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Success</title>
                <script>
                    window.onload = function() {
                        alert('Signup successful!');
                        setTimeout(function() {
                            window.location.href = 'login.php';
                        }, 500); 
                    };
                </script>
            </head>
            <body>
            </body>
            </html>";
            //  header("Location: login.php"); // Redirect to a success page
            exit();
        } else {
            echo "error while inserting the records: " . $stmt->error;
        }


        $stmt->close();
        $conn->close();
    }

    ?>
</body>

</html>