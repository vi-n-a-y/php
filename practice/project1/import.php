<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   

    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="login-container">
        <button class="cross-btn"><a class="cross-a-tag" href="adminHome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <h2>Upload File</h2>
        <form  method="post" enctype="multipart/form-data">
            <input type="file" name="csvFile" accept=".csv" required>
            
            <input type="submit" value="upload" name="submit">
        </form>
       
    </div>
</body>
</html>
<?php
// upload.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
        // Database connection
        include_once 'db_connect.php'; // Adjust the path to your db_connect.php

        // File info
        $fileTmpPath = $_FILES['csvFile']['tmp_name'];
        $fileName = $_FILES['csvFile']['name'];
        $fileSize = $_FILES['csvFile']['size'];
        $fileType = $_FILES['csvFile']['type'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file extension
        if ($fileExtension !== 'csv') {
            die("Invalid file type. Please upload a CSV file.");
        }

        // Open the file
        if (($handle = fopen($fileTmpPath, 'r')) !== false) {
            // Skip the header row
            $header = fgetcsv($handle);

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO signup (firstName, lastName, email, contact, password, profilePic) VALUES (?, ?, ?, ?, ?, ?)");

            if (!$stmt) {
                die('Prepare Error: ' . $conn->error);
            }

            while (($data = fgetcsv($handle)) !== false) {
                // Skip empty rows
                if (empty(array_filter($data))) {
                    continue;
                }

                // print_r($data); // Debugging line to check CSV data

                if (count($data) === 6) { // Ensure there are exactly 6 columns
                    $stmt->bind_param('ssssss', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                    $stmt->execute();

                    if ($stmt->error) {
                        die('Execute Error: ' . $stmt->error);
                    }
                } else {
                    echo "Invalid data format: ";
                    print_r($data); // Print out the problematic data
                }
            }

            fclose($handle);
            $stmt->close();
            // echo "<!DOCTYPE html>
            // <html lang='en'>
            // <head>
            //     <meta charset='UTF-8'>
            //     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            //     <title>Success</title>
            //     <script>
            //         window.onload = function() {
            //             alert('uploaded successful!');
            //             setTimeout(function() {
            //                 window.location.href = 'adminHome.php';
            //             }, 10); 
            //         };
            //     </script>
            // </head>
            // <body>
            // </body>
            // </html>";
            header('location:adminHome.php');
            exit();
            // echo "File successfully uploaded and data inserted into the database.";
        } else {
            echo "Error opening the file.";
        }

        $conn->close();
    } else {
        echo "Error: " . $_FILES['csvFile']['error'];
    }
}
?>
