<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="login-container">
        <button class="cross-btn"><a class="cross-a-tag" href="welcome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <h2>Sign Up</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="firstName" id="firstName" placeholder="Enter your First Name" required>
            <input type="text" name="lastName" id="lastName" placeholder="Enter your Last Name" required>
            <input type="email" name="email" id="email" placeholder="Enter your Email" required>
            <input type="number" name="contact" id="contact" placeholder="Enter your Contact" required>
            <input type="password" name="password" id="Password" placeholder="Enter your Password" required>
            <input type="password" name="conPassword" id="conPassword" placeholder="Confirm password" required>
            <input type="file" title="Upload Your Profile" name="profile_pic" class="profilePic" id="profilePic" accept="image/*" required>

            <input type="submit" value="submit" name="submit">
        </form>
        <div class="forgot-password">
            <a href="login.php">Already Login User?</a>

        </div>
    </div>

    <?php
    include_once 'db_connect.php';

    if (isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $profilePic = null;

        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['profile_pic'];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($file['type'], $allowedTypes)) {
                $fileName = basename($file['name']);
                $targetDir = 'uploads/';
                $targetFile = $targetDir . $fileName;

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                    $profilePic = $fileName;
                    echo "Profile Picture: $profilePic<br>";
                    echo "Profile Picture1: $fileName<br>";
                } else {
                    echo "Failed to move uploaded file.";
                    exit;
                }
            } else {
                echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
                exit;
            }
        }
        echo "Profile Picture: $profilePic<br>";
        // echo "Profile Picture1: $fileName<br>";

        $stmt = $conn->prepare("INSERT INTO signup (firstName,lastName,email,contact,password,profilePic) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $contact, $password1, $profilePic,);



        if ($stmt->execute()) {
          
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
                        }, 10); 
                    };
                </script>
            </head>
            <body>
            </body>
            </html>";
            //  header("Location: login.php");
            // exit();
        } else {
            echo "error while inserting the records: " . $stmt->error;
        }


        $stmt->close();
        $conn->close();
    }

    ?>
</body>

</html>


<!-- 

<?php
//     include_once 'db_connect.php';
//     if (isset($_POST['submit'])) {
//         $firstName = $_POST['firstName'];
//         $lastName = $_POST['lastName'];
//         $email = $_POST['email'];
//         $contact = $_POST['contact'];

//         $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);



//         $profilePic = null;

//         if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
//             $file = $_FILES['profile_pic'];
//             $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

//             if (in_array($file['type'], $allowedTypes)) {
//                 $fileName = basename($file['name']);
//                 $targetDir = 'uploads/';
//                 $targetFile = $targetDir . $fileName;

//                 // Ensure the uploads directory exists
//                 if (!is_dir($targetDir)) {
//                     mkdir($targetDir, 0755, true);
//                 }

//                 // Move the uploaded file to the target directory
//                 if (move_uploaded_file($file['tmp_name'], $targetFile)) {
//                     $profilePic = $fileName;
//                     echo $profilePic;
//                 } else {
//                     echo "Failed to move uploaded file.";
//                     exit;
//                 }
//             } else {
//                 echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
//                 exit;
//             }
//         }

//         echo $profilePic;



//         $stmt = $conn->prepare("INSERT INTO signup (firstName,lastName,email,contact,password,profilePic) VALUES (?,?,?,?,?,?)");
//         $stmt->bind_param("ssssss", $firstName, $lastName, $email,$contact, $password1,$profilePic,);



//         if ($stmt->execute()) {
//             // echo "Inserted successfully";
//             // header("Location : login.php");
//             // exit();
// echo $profilePic;




//             // echo "<!DOCTYPE html>
//             // <html lang='en'>
//             // <head>
//             //     <meta charset='UTF-8'>
//             //     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
//             //     <title>Success</title>
//             //     <script>
//             //         window.onload = function() {
//             //             alert('Signup successful!');
//             //             // setTimeout(function() {
//             //             //     window.location.href = 'login.php';
//             //             // }, 10); 
//             //         };
//             //     </script>
//             // </head>
//             // <body>
//             // </body>
//             // </html>";
//             //  header("Location: login.php"); // Redirect to a success page
//             // exit();
//         } else {
//             echo "error while inserting the records: " . $stmt->error;
//         }


//         $stmt->close();
//         $conn->close();
//     }

?> -->