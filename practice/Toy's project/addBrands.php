<?php
session_start();
include_once 'db_connect.php';

// Process form submission and redirection logic
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $updateId = isset($_GET['updateId']) ? $_GET['updateId'] : null;

    if ($type == 'update') {
        if (isset($_POST['submit'])) {
           $brandName = $_POST['brandName'];
            $stmt = $conn->prepare("UPDATE `brands` SET name=? WHERE id=?");
            $stmt->bind_param("si",$brandName, $updateId);
            if ($stmt->execute()) {
                header('Location: adminHome.php');
                exit();
            } else {
                $error = "Something went wrong";
            }
        }

        // Fetch age group data for update
        $sql = "SELECT * FROM `brands` WHERE id=$updateId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $brandName = $row['name'];
            $pageHeader = 'Update Brand';
            $pageButton = 'Update';
        } else {
            header('Location: home.php');
            exit();
        }
    } elseif ($type == 'delete') {
        $deleteId = $_GET['deleteId'];

        $sql = "delete from `brands` where id=$deleteId";
        $result = mysqli_query($conn, $sql);
        if ($result) {

            header('location:adminHome.php');
        } else {
            die(mysqli_error($conn));
        }
    }
}





if (isset($_POST['submit'])) {
    $brandName = $_POST['brandName'];
 

    $stmt = $conn->prepare("INSERT INTO brands (name) VALUES (?)");
    $stmt->bind_param("s", $brandName);



    if ($stmt->execute()) {

         header("Location: adminHome.php"); // Redirect to a success page
        exit();
    } else {
        echo "error while inserting the records: " . $stmt->error;
        header("Location: adminLogin.php"); // Redirect to a success page
        exit();
    }

}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
    <link rel="stylesheet" href="updates.css">
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->

</head>

<body>
    <div class="form-container">
        <button class="cross-btn"><a class="cross-a-tag" href="adminHome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <form class="kids-form" id="signup-form" method="post" enctype="multipart/form-data">
            <h1><?php echo isset($pageHeader) ? $pageHeader : "Add Brand"; ?></h1>
            <label for="name">Brand Name</label>
            <input type="text" name="brandName" id="name" class="required" value="<?php echo isset($brandName) ? $brandName : ""; ?>" placeholder="Enter Brand Name">
            <span id="nameError" class="error-message"></span>
            <button class="submit-btn" name="submit" type="submit"><?php echo isset($pageButton) ? $pageButton : "Add"; ?></button>
        </form>
    </div>





    <script>
        function validateName() {
            const name = document.getElementById('name').value.trim();
            const nameError = document.getElementById('nameError');
            if (!name) {
                nameError.innerHTML = '<span class="error-icon"></span>Age Range is required.';
                return false;
            } else {
                nameError.textContent = '';
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
            // Perform validation on all fields
            isValid &= validateName();


            if (!isValid) {
                event.preventDefault(); // Prevent form submission
            }
        }

        function addEventListeners() {
            // Add input event listeners for real-time validation
            document.getElementById('name').addEventListener('input', validateName);

            // document.getElementById('file').addEventListener('change', validateFile);

            // Form validation on submit
            document.getElementById('signup-form').addEventListener('submit', validateForm);


        }

        // Initialize event listeners
        addEventListeners();
    </script>







</body>

</html>