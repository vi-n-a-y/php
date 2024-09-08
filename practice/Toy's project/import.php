




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Files</title>
    <link rel="stylesheet" href="updates.css">
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->

</head>

<body>
    <div class="form-container">
        <button class="cross-btn"><a class="cross-a-tag" href="adminHome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <form class="kids-form" id="signup-form" method="post" enctype="multipart/form-data">
            <h1>Import File</h1>
            
            <input type="file" name="csvFile" accept=".csv" required>
            
            <button class="submit-btn" name="submit" type="submit">Submit</button>
        </form>
    </div>













    <?php
include_once 'db_connect.php';


if (isset($_POST['submit'])) {
    // Check if file is uploaded
    if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] == 0) {
        $fileTmpPath = $_FILES['csvFile']['tmp_name'];
        $fileName = $_FILES['csvFile']['name'];
        $fileSize = $_FILES['csvFile']['size'];
        $fileType = $_FILES['csvFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check if the file is a CSV
        if ($fileExtension == 'csv') {
            // Open the file for reading
            if (($handle = fopen($fileTmpPath, 'r')) !== FALSE) {
                // Skip the header row
                fgetcsv($handle);

                // Read the file line by line
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    // Assuming CSV columns: id, name, description, price, SKU, categoryId, brandId, ageGroupId, stockQuantity, imageUrl, discount, status
                    // $id = $conn->real_escape_string($data[0]);
                    $name = $conn->real_escape_string($data[0]);
                    $description = $conn->real_escape_string($data[1]);
                    $price = $conn->real_escape_string($data[2]);
                    $SKU = $conn->real_escape_string($data[3]);
                    $categoryId = $conn->real_escape_string($data[4]);
                    $brandId = $conn->real_escape_string($data[5]);
                    $ageGroupId = $conn->real_escape_string($data[6]);
                    $stockQuantity = $conn->real_escape_string($data[7]);
                    $imageUrl = $conn->real_escape_string($data[8]);
                    $discount = $conn->real_escape_string($data[9]);
                    $status = $conn->real_escape_string($data[10]);

                    // Prepare the SQL statement
                    $sql = "INSERT INTO products ( name, description, price, SKU, categoryId, brandId, ageGroupId, stockQuantity, imageUrl, discount, status)
                            VALUES ( '$name', '$description', '$price', '$SKU', '$categoryId', '$brandId', '$ageGroupId', '$stockQuantity', '$imageUrl', '$discount', '$status')";

                            print_r($sql);

                    // Execute the query
                    if (!$conn->query($sql)) {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                // Close the file
                fclose($handle);
                header('location:adminHome.php');
            } else {
                echo "Error opening the file.";
            }
        } else {
            echo "Uploaded file is not a CSV.";
        }
    } else {
        echo "No file uploaded or there was an error during upload.";
    }
}

// Close connection
$conn->close();
?>
