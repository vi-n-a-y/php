<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   

    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="login-container">
    <button class="cross-btn"><a class="cross-a-tag" href="adminHome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <h2>Add User</h2>
        <form action="" method="post">
            <input type="text" name="firstName" id="firstName" placeholder="Enter User First Name" required>
            <input type="text" name="lastName" id="lastName" placeholder="Enter User Last Name" required>
            <input type="email" name="email" id="email" placeholder="Enter User Email" required>
            <input type="number" name="contact" id="contact" placeholder="Enter User Contact" required>
            <input type="password" name="password" id="Password" placeholder="Enter User Password" required>
            <input type="password" name="conPassword" id="conPassword" placeholder="Confirm User password" required>

            <input type="submit" value="Add User" name="submit">
        </form>
    </div>



    <?php
    if (isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        
        // $password1=$_POST['password'];


        // echo $firstName."<br>";
        // echo $lastName."<br>";
        // echo $email."<br>";
        // echo $_POST['password']."<br>";
        $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);


        include_once 'db_connect.php';



        $stmt = $conn->prepare("INSERT INTO signup (firstName,lastName,email,contact,password) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email,$contact, $password1);



        if ($stmt->execute()) {



            // echo "<!DOCTYPE html>
            // <html lang='en'>
            // <head>
            //     <meta charset='UTF-8'>
            //     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            //     <title>Success</title>
            //     <script>
            //         window.onload = function() {
            //             alert('Signup successful!');
            //             setTimeout(function() {
            //                 window.location.href = 'login.php';
            //             }, 10); 
            //         };
            //     </script>
            // </head>
            // <body>
            // </body>
            // </html>";
             header("Location: adminHome.php"); // Redirect to a success page
            exit();
        } else {
            echo "error while inserting the records: " . $stmt->error;
            header("Location: admin.php"); // Redirect to a success page
            exit();
        }


        $stmt->close();
        $conn->close();
    }

    ?>
</body>

</html>