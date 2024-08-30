<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   

    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="login-container">
        <button class="cross-btn"><a class="cross-a-tag" href="welcome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="submit" value="Login" name="submit">
        </form>
        <div class="forgot-password">
            <a href="#">Forgot your password?</a>
            <a href="signup.php" id="signup">Signup</a>
        </div>
    </div>

    <?php
    session_start();

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password1 = $_POST['password'];
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // echo "Valid email";
            } else {
                echo "Invalid Email address<br>";
            }
        } else {
            echo "Please enter your email<br>";
        }

        if (!empty($password1)) {

            if (preg_match("/^[a-zA-Z0-9$@_]*$/", $password1)) {
                // echo "correct format";
            } else {
                echo "invalid password<br>";
            }
        } else {
            echo "please enter your password<br>";
        }


        include_once 'db_connect.php';


        $stmt = $conn->prepare("SELECT id,firstName,lastName,password FROM signup WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($dbId, $firstName, $lastName, $hashedPassword);
            $stmt->fetch();


            if (password_verify($password1, $hashedPassword)) {
                echo "successfull ";

                $firstNameEncoded = urlencode($firstName);
                $lastNameEncoded = urlencode($lastName);

                $_SESSION['dbId'] = $dbId;



                header("Location: home.php?firstName={$firstNameEncoded}&lastName={$lastNameEncoded}");
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
</body>

</html>