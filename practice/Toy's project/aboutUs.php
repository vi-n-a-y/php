<?php
ob_start();
include_once 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $content1 = $_POST['content1'];
    $aboutFile = null;
    if (isset($_FILES['aboutFile']) && $_FILES['aboutFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['aboutFile'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        if (in_array($file['type'], $allowedTypes)) {
            $fileName = basename($file['name']);
            $targetDir = 'images/';
            $targetFile = $targetDir . $fileName;
            if (!is_writable($targetDir)) {
                echo "The directory is not writable.";
            }
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $aboutFile = $fileName;
            } else {
                echo "Failed to move uploaded file.";
                exit;
            }
        } else {
            echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
            exit;
        }
    }
    $stmt = $conn->prepare("INSERT INTO aboutUs (title, content, content1, aboutFile) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $content1, $aboutFile);
    if ($stmt->execute()) {
        header('Location: adminHome.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F4DEB3;
        }

        .aboutus-flex {
            /* height: 100vh; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-abt {
            width: 1400px;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }

        .container-abt h1 {
            color: #333;
            text-align: center;
        }

        .container-abt form {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: auto;
        }

        .container-abt label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .container-abt input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container-abt input[type="file"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container-abt input[type="submit"] {
            margin-left: 15px;
            background: #5cb85c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .container-abt input[type="submit"]:hover {
            background: #4cae4c;
        }

        .container-abt input[type="file"]::-webkit-file-upload-button {
            background: #5cb85c;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .container-abt input[type="file"]::placeholder {
            color: #ff5722;
        }

        .quill-container1 {
            width: 100%;
            height: 200px; /* Set height for the first Quill editor */
            margin-bottom: 50px;
        }

        .quill-container2 {
            width: 100%;
            height: 300px; /* Set height for the second Quill editor */
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
<?php  include_once 'header.php'  ?>

<!-- <div class="getting-abt-page">
    <?php


?> -->

</div>




<div class="aboutus-flex">
    <div class="container-abt">
        <h1>Add About Us</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <div class="quill-container1">
                <div id="quill-editor1"></div>
            </div>
            <input type="hidden" name="content" id="quill-editor-content1">
            <span id="productDesError" class="error-message"></span>

            <label for="content1">Description:</label>
            <div class="quill-container2">
                <div id="quill-editor2"></div>
            </div>
            <input type="hidden" name="content1" id="quill-editor-content2">
            <span id="productDesError" class="error-message"></span>

            <label for="content">File:</label>
            <input type="file" name="aboutFile" accept="image/*" id="file">

            <input type="submit" value="Submit">
        </form>
    </div>
</div>


<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    // Initialize the first Quill editor
    var quill1 = new Quill('#quill-editor1', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'font': [] }],
                [{ 'align': [] }],
                ['link', 'image', 'video']
            ]
        }
    });

    // Update the hidden field for the first Quill editor
    quill1.on('text-change', function() {
        document.getElementById('quill-editor-content1').value = quill1.root.innerHTML;
    });

    // Initialize the second Quill editor
    var quill2 = new Quill('#quill-editor2', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'font': [] }],
                [{ 'align': [] }],
                ['link', 'image', 'video']
            ]
        }
    });

    // Update the hidden field for the second Quill editor
    quill2.on('text-change', function() {
        document.getElementById('quill-editor-content2').value = quill2.root.innerHTML;
    });
</script>
<?php  include_once 'footer.php'  ?>
</body>
</html>
