<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   

    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="login-container">
    <button class="cross-btn"><a class="cross-a-tag" href="welcome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <h2>Admin Login</h2>
        <form action="admin.php" method="post">
            <input type="email" name="adminMail" placeholder="Enter Admin Mail" required>
            <input type="password" name="adminPassword" placeholder="Enter your password" required>
            <input type="submit" value="Login" name="submit">
        </form>
        <div class="forgot-password">
            <a href="#">Forgot your password?</a>
        </div>
    </div>


    <?php

    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminMail = $_POST['adminMail'];
        $adminPassword = $_POST['adminPassword'];

        echo $adminMail;
        echo $adminPassword;


        include_once 'db_connect.php';
        $stmt = $conn->prepare("SELECT adminMail,adminPassword FROM admin WHERE adminMail=?");
        $stmt->bind_param("s", $adminMail);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($databaseMail, $databasePassword);
            $stmt->fetch();

            if ($databasePassword === $adminPassword) {
                $_SESSION['adminMail'] = $databaseMail;
                header("Location: adminHome.php");
                exit();
            } else {

                echo "Invalid Password";
            }
        } else {
            echo "Invalid email or password";
        }

        $stmt->close();
        $conn->close();
    }

    ?>
</body>

</html>

