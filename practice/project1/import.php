<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload SQL File</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .import-div{
            border:1px solid black;
            padding:50px 50px
        }
        .import-div input[type="file"] {
            padding:10px 15px;
            
        }
    </style>
</head>
<body>
   <div class="import-div">
   <form  method="post" enctype="multipart/form-data">
        <input type="file" name="sqlfile" accept=".sql">
        <input type="submit" value="submit" name="submit">
    </form>
   </div>
</body>
</html>





<?php

include_once 'db_connect.php';
if(isset($_POST['submit'])){

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['sqlfile'])) {
    
    if ($_FILES['sqlfile']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['sqlfile']['tmp_name'];
        $fileName = $_FILES['sqlfile']['name'];
        $fileSize = $_FILES['sqlfile']['size'];
        $fileType = $_FILES['sqlfile']['type'];
        
        // Read the file contents
        $sql = file_get_contents($fileTmpPath);

        // Execute the SQL queries
        if ($conn->multi_query($sql)) {
            do {
                // Store result set if there is one
                if ($result = $conn->store_result()) {
                    while ($row = $result->fetch_row()) {
                        // process the row
                    }
                    $result->free();
                }
            } while ($conn->more_results() && $conn->next_result());
            echo "SQL file imported successfully.";
        } else {
            echo "Error importing SQL file: " . $conn->error;
        }
    } else {
        echo "File upload error.";
    }
} else {
    echo "Invalid request.";
}

}
$conn->close();
?>
