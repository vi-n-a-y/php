<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F7F8;
            

        }

        .aboutus-flex{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .container {
            width: 80%;
            
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"]{
            width:100%;
            padding:15px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;

        }

        input[type="submit"] {
            margin-left:15px;
            background: #5cb85c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background: #4cae4c;
        }


        input[type="file"]::-webkit-file-upload-button {
            background: #5cb85c;
            color: #fff;
            border: none;
            
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
<div class="aboutus-flex">

<div class="container">
        <h1>Add About Us</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" required></textarea>

            <label for="content">File:</label>
            <input type="file" name="aboutFile" accept="image/*" id="file">

            <input type="submit" value="Submit">
        </form>
    </div>

</div>

    </body>

    <?php
include_once 'db_connect.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    // $aboutFile=$_POST['aboutFile'];


    $aboutFile = null;

        if (isset($_FILES['aboutFile']) && $_FILES['aboutFile']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['aboutFile'];
            $allowedTypes = ['image/jpeg', 'image/png','image/jpg', 'image/gif'];

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
                    $aboutFile = $fileName;
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

   
    $stmt = $conn->prepare("INSERT INTO aboutUs (title, content,aboutFile) VALUES (?, ?,?)");
    $stmt->bind_param("sss", $title, $content,$aboutFile);

    // Execute
    if ($stmt->execute()) {
        // echo "New record created successfully";

        header('location:adminHome.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

</html>






<!-- cd "/Applications/XAMPP/xamppfiles/htdocs/dashboard/practice/Toy's project/"
chmod 755 images
chmod 777 images -->



