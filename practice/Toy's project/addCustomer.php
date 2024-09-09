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

    <!-- <link rel="stylesheet" href="styles.css"> -->
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

        /* Apply a fun background to the entire page */
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

        /* Style the form container */
        .form-container {
            background: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
        }


        .kids-form h1 {
            color: #ff5722;
            /* Bright, playful color for the header */
            text-align: center;
            font-size: 2rem;
        }

        .kids-form label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1.1rem;
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


        #gender{
            width: 100%;
            padding: 10px;

            margin-top: 15px;
            border: 2px solid #ff5722;
            border-radius: 5px;
            font-size: 1rem;
            background-color: whitesmoke;
            opacity: 0.8;
        }

        .kids-form input::placeholder {
            color: #ff5722;
            /* Match the placeholder color with the theme */
        }

        .kids-form button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #ff5722;
            /* Fun and bright button color */
            color: white;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .kids-form button:hover {
            background-color: #e64a19;
            /* Slightly darker shade for the hover effect */
        }

        .input-text-first-last {
            display: grid;
            grid-template-columns: 180px 180px;
            column-gap: 20px;
        }

        .con-st-region {
            display: flex;
            gap: 5px;
            font-size: 2px;

        }

        .con-st-region input {
            padding-left: 8px;
            padding-right: 5px;
            border: 2px solid #ff5722;
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



        .select-box {
            position: relative;

            /* width: 26rem; */
            /* margin: 7rem auto; */
            /* margin-bottom: 15px; */

        }


        input[type="date"]::placeholder {
            color: #e64a19; /* Change this color to your preferred placeholder color */
        }

        /* .select-box input {
    width: 100%;
    padding: 1rem .6rem;
    font-size: 1.1rem;
    
    border: .1rem solid transparent;
    outline: none;
} */

        /* input[type="tel"] {
    border-radius: 0 .5rem .5rem 0;
} */


        .selected-option input[type="number"] {
            margin-bottom: 0;
            border: none;
            border-radius: 5px;
            margin-top:1px;
        }

        /* .select-box input:focus {
    border: .1rem solid var(--primary);
} */

        .selected-option {
            background-color: #eee;
            border-radius: .5rem;
            overflow: hidden;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid #ff5722;
            margin-top:15px;
        }

        .selected-option div {
            position: relative;

            width: 6rem;
            padding: 0 2.8rem 0 .5rem;
            text-align: center;
            cursor: pointer;
        }

        .options{
            position:relative;
            z-index: 100;
        }

        .selected-option div::after {
            position: absolute;
            content: "";
            right: .8rem;
            top: 30%;
            transform: translateY(-50%) rotate(45deg);

            width: .8rem;
            height: .8rem;
          border-right: .12rem solid #ff5722;
            border-bottom: .12rem solid #ff5722;

            transition: .2s;
        }

        .selected-option div.active::after {
            transform: translateY(-50%) rotate(225deg);
        }

        .select-box .options {
            position: absolute;
            top: 3.3rem;

            width: 100%;
            background-color: #fff;
            border-radius: .5rem;

            display: none;
        }

        .select-box .options.active {
            display: block;
        }

        .select-box .options::before {
            position: absolute;
            content: "";
            left: 1rem;
            top: -1.2rem;

            width: 0;
            height: 0;
            border: .6rem solid transparent;
            border-bottom-color: var(--primary);
        }

        input.search-box {
            /* background-color: var(--primary); */
            color: black;
            /* border-radius: .5rem .5rem 0 0; */
            padding: 1rem 0.631rem;
            margin-bottom:0;
            /* width: 94%; */
        }

        .select-box ol {
            margin-top:10px;
            list-style: none;
            max-height: 150px;
            overflow: overlay;
            position:relative;
            z-index: 10;
            /* height: 300px; */
        }

        .select-box ol::-webkit-scrollbar {
            width: 0.6rem;
        }

        .select-box ol::-webkit-scrollbar-thumb {
            width: 0.4rem;
            height: 3rem;
            background-color: #ccc;
            border-radius: .4rem;
        }

        .select-box ol li {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
        }

        .select-box ol li.hide {
            display: none;
        }

        .select-box ol li:not(:last-child) {
            border-bottom: .1rem solid #eee;
        }

        .select-box ol li:hover {
            background-color: lightcyan;
        }

        .select-box ol li .country-name {
            margin-left: .4rem;
        }


        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}




input[type="file"] {
            background-color: #fff;
            border: 2px solid #ff5722;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 94%;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        input[type="file"]::-webkit-file-upload-button {
            background: #ff5722;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        
        input[type="file"]::placeholder {
            color: #ff5722;
        }
    </style>


</head>

<body>
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
            
            <button name="submit" type="submit"><?php echo isset($pageButton) ? $pageButton : "Add"; ?></button>
        </form>
    </div>
</body>

<!-- <script src="geolocation.js"></script> -->
<script src="inputValidation.js"></script>


</html>




