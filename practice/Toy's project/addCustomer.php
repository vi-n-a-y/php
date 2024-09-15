<?php
session_start();
include_once 'db_connect.php';

// Process form submission and redirection logic
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $updateId = isset($_GET['updateId']) ? $_GET['updateId'] : null;

    if ($type == 'update') {
        if (isset($_POST['submit'])) {

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $dob=$_POST['dob'];
            $email = $_POST['email'];
            $contact = $_POST['number'];
            $gender=$_POST['gender'];
            $address=$_POST['address'];
            $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);




            $profilePic = null;





            

            if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['profile_pic'];
                $allowedTypes = ['image/jpeg','image/jpg', 'image/png', 'image/gif'];
    
                if (in_array($file['type'], $allowedTypes)) {
                    $fileName = basename($file['name']);
                    $targetDir = 'images/';
                    $targetFile = $targetDir . $fileName;
    
                    if (!is_writable($targetDir)) {
                        echo "The directory is not writable.";
                    } else {
                        // echo "The directory is writable.";
                    }
                    
    
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0755, true);
                    }
    
                    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                        $profilePic = $fileName;
                        // echo "Profile Picture: $profilePic<br>";
                        // echo "Profile Picture1: $fileName<br>";
                    } else {
                        echo "Failed to move uploaded file.";
                        exit;
                    }
                } else {
                    echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
                    exit;
                }
            }

           
            $stmt = $conn->prepare("update `customers` set  firstName=?,lastName=?,dob=?,email=?,number=?,gender=?,address=?,password1=?,profilePic=? where id=?");
            $stmt->bind_param("sssssssssi",$firstName,$lastName,$dob,$email,$contact,$gender,$address,$password1,$profilePic, $updateId);
            if ($stmt->execute()) {
                header('Location: adminHome.php');
                exit();
            } else {
                $error = "Something went wrong";
            }
        }

        // Fetch age group data for update
        $sql = "SELECT * FROM `customers` WHERE id=$updateId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $dbFirstName = $row['firstName'];
            $dbLastName = $row['lastName'];
            $dbDob = $row['dob'];
            $dbEmail = $row['email'];
            $dbContact = $row['number'];
            $dbGender = $row['gender'];
            $dbAddress = $row['address'];
            $dbFile = $row['profilePic'];
            // $dbPassword=$row['password1'];
           
          
            $pageHeader = 'Update Customer';
            $pageButton = 'Update';
        } else {
            header('Location: home.php');
            exit();
        }
    } elseif ($type == 'delete') {
        $deleteId = $_GET['deleteId'];

        $sql = "delete from `customers` where id=$deleteId";
        $result = mysqli_query($conn, $sql);
        if ($result) {

            header('location:adminHome.php');
        } else {
            die(mysqli_error($conn));
        }
    }
}





if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob=$_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $gender=$_POST['gender'];
   
    $address=$_POST['address'];
    // echo $address;
    
    $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $profilePic = null;

    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['profile_pic'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($file['type'], $allowedTypes)) {
            $fileName = basename($file['name']);
            $targetDir = 'images/';
            $targetFile = $targetDir . $fileName;

            if (!is_writable($targetDir)) {
                echo "The directory is not writable.";
            } else {
                // echo "The directory is writable.";
            }
            

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $profilePic = $fileName;
                // echo "Profile Picture: $profilePic<br>";
                // echo "Profile Picture1: $fileName<br>";
            } else {
                echo "Failed to move uploaded file.";
                exit;
            }
        } else {
            echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
            exit;
        }
    }
    // echo "Profile Picture: $profilePic<br>";
    // echo "Profile Picture1: $fileName<br>";

    $stmt = $conn->prepare("INSERT INTO customers (firstName ,lastName ,dob,gender,email ,number ,password1 ,address ,
profilePic) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $firstName, $lastName,$dob,$gender, $email, $contact, $password1,$address, $profilePic,);

print_r($stmt);

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
        //                 window.location.href = 'adminHome.php';
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
    <title>My Account</title>

    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <style>
        /* styles.css */



        .error { color: red; }
        .error-message { display: block; color: red; font-size: 0.875em; margin-top: 0.5em; }
        /* .required:after { content: " *"; color: red; } */
        .error-icon { color: red; margin-right: 0.5em; }
        .error-icon::before { content: "\f071"; font-family: "Font Awesome 6 Free"; font-weight: 900; } /* ⚠️ icon */
        
        .password-container {
            position: relative;
        }
        .password-container input {
            padding-right: 2.5em; /* Adjust for icon */
          /* relative */
        }
        .password-container .fa-eye, .password-container .fa-eye-slash {
            position: absolute;
            right: 0.5em;
            top: 35%;
            transform: translateY(10%);
            cursor: pointer;
            color: #000;
        }

    

        .kids-form h1 {
            color: black;
            /* Bright, playful color for the header */
            text-align: center;
            font-size: 2rem;
        }

        .kids-form label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1.1rem;
        }

  


        #gender{
            width: 94%;
            padding: 10px;

            margin-top: 15px;
            border: 2px solid black;
            border-radius: 5px;
            font-size: 1rem;
            background-color: whitesmoke;
            opacity: 0.8;
        }

        .kids-form input::placeholder {
            color: black;
            /* Match the placeholder color with the theme */
        }

       

      



        /* .input-group{
  position: relative;
}
.input-group::after{
  content: '*';
  position: absolute;
  top: 0px;
  left: 46px;
  color: #f00;
} */

/* placeholder text style */
/* input[type="date"]::-webkit-datetime-edit-text,
input[type="date"]::-webkit-datetime-edit-month-field,
input[type="date"]::-webkit-datetime-edit-day-field,
input[type="date"]::-webkit-datetime-edit-year-field {
  color: #e64a19;
  
} */













        :root {
            --primary: #111;
            --secondary: #fd0;
        }




.form-container input[type="text"],
.form-container input[type="number"]{
    border: 2px solid black;
    width: 94%;
}



        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}




.form-container input[type="file"] {
            background-color: #fff;
            border: 2px solid black;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 94%;
            margin-bottom: 15px;
            /* opacity: 0.8; */
        }

        .form-container input[type="file"]::-webkit-file-upload-button {
            background: black;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        
     .form-container   input[type="file"]::placeholder {
            color: black;
        }



        .cross-btn {
    display: block;
    float: right;
    position: absolute;
    top: 5px;
    right: 2px;
    padding: 0;
    border: none;
    background: rgba(0, 0, 0, 0);
}

.cross-a-tag {
    text-decoration: none;
    color: black;
    font-size: 25px;
    text-align: center;
    padding: 0;
    margin: 0;
}


    .container-admin-panel {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        /* Full viewport height */
    }

    .content {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        /* Ensure full width */
    }

    .form-container {
        width: 800px;
        /* max-width: 600px; */
        /* Set a max width for the form container */
        margin: 0 auto;
        /* Center horizontally */
        padding: 20px 20px 20px 40px;
        /* Add some padding */
        border: 1px solid #ddd;
        /* Optional: Add border */
        border-radius: 8px;
        /* Optional: Add border radius for rounded corners */
        background-color: #f9f9f9;
        /* Optional: Add background color */
        position: absolute;
        top:25%;
        left:30%;
        /* height: 150px; */
        max-width: 1000px;
    }

    /* .form-container button {

        width: 94%;
    } */

    .form-container h1 {
        width: 94%;
        margin: 15px 0;
    }

    .form-container input[type="text"]{
        margin-top:10px;
    }


    .kids-form input {
            width: 94%;
            padding: 10px;
            color:black;

            margin-top: 15px;
            border: 2px solid black;
            border-radius: 5px;
            font-size: 1rem;
            background-color: whitesmoke;
            opacity: 0.8;
            
        }



  
    .form-container .submit-btn {

width: 94%;

    }
    .input-text-first-last {
        width: 96%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    /* column-gap: 20px; */
}
    </style>


</head>

<body>



<?php include_once 'adminHeader.php';  ?>
    <div class="container-admin-panel">






        <main class="content">

            <section id="section2" class="section products-db">
<div class="form-container">
        <form class="kids-form" id="signup-form" method="post" enctype="multipart/form-data">
        <h1><?php echo isset($pageHeader) ? $pageHeader : "Add Customer"; ?></h1>
            
            <div class="input-text-first-last">
                <div class="first-name">
                <input type="text" name="firstName" id="name" class="required" value="<?php echo isset($dbFirstName) ? $dbFirstName : ""; ?>" placeholder="Name">
                <span id="nameError" class="error-message"></span>
                </div>

                <div class="last-name">
                <input type="text" id="lastName"  name="lastName" class="required" value="<?php echo isset($dbLastName) ? $dbLastName : ""; ?>" placeholder="Last Name">
                <span id="lastNameError" class="error-message"></span>
                </div>
               
            </div>

            <input type="date" id="dob" name="dob" class="required" value="<?php echo isset($dbDob) ? $dbDob : ""; ?>" placeholder="Date of Birth">
            <span id="dobError" class="error-message"></span>

            <select id="gender" name="gender" >
            <option value="<?php echo isset($dbGender) ? $dbGender : ""; ?>"><?php echo isset($dbGender) ? $dbGender : "Select"; ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

            <input type="email" id="email" name="email" class="required" value="<?php echo isset($dbEmail) ? $dbEmail : ""; ?>" placeholder="Email">
            <span id="emailError" class="error-message"></span>
              <input type="number" name="number" value="<?php echo isset($dbContact) ? $dbContact : ""; ?>" placeholder="Phone Number">

             <span id="phoneError" class="error-message"></span>

           
                <input type="text" id="address" name="address" value="<?php echo isset($dbAddress) ? $dbAddress : ""; ?>" placeholder="Address" >
                <span id="districtError" class="error-message"></span>

            
            <div class="password-container">
                <input type="password" name="password" id="password" class="required"  placeholder="Password">
                <!-- <i id="togglePassword" class="fa fa-eye"></i> -->
                <span id="passwordError" class="error-message"></span>
            </div>
            
            <div class="password-container">
                <input type="password" name="confirmPassword" id="confirmPassword" class="required"  placeholder="Confirm Password">
                <!-- <i id="toggleConfirmPassword" class="fa fa-eye"></i> -->
                <span id="confirmPasswordError" class="error-message"></span>
            </div>
            
            <input type="file" name="profile_pic"  id="file" accept="image/*">
            <span id="fileError" class="error-message"></span>
            
            <button class="submit-btn" name="submit" type="submit"><?php echo isset($pageButton) ? $pageButton : "Add"; ?></button>
        </form>
    </div>



    </section>

</main>
</div>

<script src="sideBar.js"></script>
    

</body>

<!-- <script src="geolocation.js"></script> -->
<script src="inputValidation.js"></script>


</html>




