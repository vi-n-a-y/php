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
            $_SESSION['adminLogin'] = $databaseMail;
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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* styles.css */



        .error {
            color: red;
        }

        .error-message {
            display: block;
            color: red;
            font-size: 0.875em;
            margin-top: 0.5em;
        }

        /* .required:after { content: " *"; color: red; } */
        .error-icon {
            color: red;
            margin-right: 0.5em;
        }

        .error-icon::before {
            content: "\f071";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
        }

        /* ⚠️ icon */

        .password-container {
            position: relative;
        }

        .password-container input {
            padding-right: 2.5em;
            /* Adjust for icon */
            /* relative */
        }

        .password-container .fa-eye,
        .password-container .fa-eye-slash {
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
            position: relative;
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
            color: black;

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

        .kids-form .submit-btn {
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



        .con-st-region input {
            padding-left: 8px;
            padding-right: 5px;
            border: 2px solid #ff5722;
        }


        
.cross-btn {
    display: block;
    float: right;
    position:absolute; 
    
    
    top:5px;
    right:2px;


    /* background-color: white; */
    padding:0;

    border: none;
    background: rgba(0, 0, 0, 0);

}

.cross-a-tag {

    text-decoration: none;
    color: red;
    font-size: 25px;
    text-align: center;
    padding:0;
    margin:0;


}



    </style>


</head>

<body>
    <div class="form-container">
    <button class="cross-btn"><a class="cross-a-tag" href="home.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <form class="kids-form" id="signup-form" method="post" enctype="multipart/form-data">

          
            <h1>Admin Login</h1>



            <input type="email" id="email" name="adminMail" class="required" placeholder="Email">
            <span id="emailError" class="error-message"></span>




            <div class="password-container">
                <input type="password" name="adminPassword" id="password" class="required" placeholder="Password">

                <span id="passwordError" class="error-message"></span>
            </div>



            <button class="submit-btn" type="submit">Submit</button>
        </form>
    </div>




    <script>






function validateEmail() {
    const email = document.getElementById('email').value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailError = document.getElementById('emailError');
    if (!email || !emailPattern.test(email)) {
        emailError.innerHTML = '<span class="error-icon"></span>Enter a valid email address.';
        return false;
    } else {
        emailError.textContent = '';
        return true;
    }
}



function validatePassword() {
    const password = document.getElementById('password').value;
    const passwordError = document.getElementById('passwordError');
    let errors = [];

    // Check for minimum length
    if (password.length < 6) {
        errors.push('Password must be at least 6 characters long.');
    }

    // Check for at least one uppercase letter
    if (!/[A-Z]/.test(password)) {
        errors.push('Password must contain at least one uppercase letter.');
    }

    // Check for at least one lowercase letter
    if (!/[a-z]/.test(password)) {
        errors.push('Password must contain at least one lowercase letter.');
    }

    // Check for at least one number
    if (!/[0-9]/.test(password)) {
        errors.push('Password must contain at least one number.');
    }

    // Check for at least one special character
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        errors.push('Password must contain at least one special character.');
    }

    // Update the error message
    if (errors.length > 0) {
        passwordError.innerHTML = errors.map(error => `<span class="error-icon"></span>${error}`).join('<br>');
        return false;
    } else {
        passwordError.textContent = '';
        return true;
    }
}


// function validateFile() {
//     const fileInput = document.getElementById('file');
//     const fileError = document.getElementById('fileError');
//     if (fileInput.files.length === 0) {
//         fileError.innerHTML = '<span class="error-icon"></span>File is required.';
//         return false;
//     } else {
//         fileError.textContent = '';
//         return true;
//     }
// }

function validateForm(event) {
    let isValid = true;

    isValid &= validateEmail();

    isValid &= validatePassword();
   
    // isValid &= validateFile();

    if (!isValid) {
        event.preventDefault(); // Prevent form submission
    }
}

function addEventListeners() {
    // Add input event listeners for real-time validation

    document.getElementById('email').addEventListener('input', validateEmail);

    document.getElementById('password').addEventListener('input', validatePassword);

    // document.getElementById('file').addEventListener('change', validateFile);

    // Form validation on submit
    document.getElementById('signup-form').addEventListener('submit', validateForm);

    // Toggle password visibility

}

// Initialize event listeners
addEventListeners();





    </script>












</body>

</html>