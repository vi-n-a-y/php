<?php

// Start output buffering
ob_start();

// Include database connection
require 'db_connect.php';

// Initialize variables
$action = isset($_GET['type']) ? $_GET['type'] : '';
$updateId = isset($_GET['updateId']) ? intval($_GET['updateId']) : 0;
$errorMsg = '';
$product = []; // Initialize product array

if (isset($_GET['type']) && $_GET['type'] === 'delete' && isset($_GET['deleteId']) && $_GET['deleteId'] > 0) {
    $deleteId = intval($_GET['deleteId']);

    $sql = "DELETE FROM `products` WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteId);
    $result = $stmt->execute();
    
    if ($result) {
        header('Location: adminHome.php');
        exit();
    } else {
        die(mysqli_error($conn));
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $SKU = $_POST['SKU'];
    $categoryId = $_POST['categoryId'];
    $brandId = $_POST['brandId'];
    $ageGroupId = $_POST['ageGroupId'];
    $stockQuantity = $_POST['stockQuantity'];
    $discount = $_POST['discount'];
    $status = $_POST['status'];
    $subCategoryId=$_POST['subCategory'];

    // Handle file upload
    $imageUrl = '';
    if (isset($_FILES['imageUrl']) && $_FILES['imageUrl']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['imageUrl']['tmp_name'];
        $originalName = basename($_FILES['imageUrl']['name']);
        $uploadDir = 'images/';
        $uploadFile = $uploadDir . $originalName;

        // Validate file type and size
        $allowedTypes = ['image/jpeg', 'image/png','image/avif', 'image/gif'];
        $fileType = mime_content_type($tmpName);
        
        if (in_array($fileType, $allowedTypes) && $_FILES['imageUrl']['size'] < 2000000) { // Limit size to 2MB
            if (move_uploaded_file($tmpName, $uploadFile)) {
                $imageUrl = $originalName; // Save only the file name in the database
            } else {
                $errorMsg = "Failed to upload image.";
            }
        } else {
            $errorMsg = "Invalid file type or size.";
        }
    } else if ($action === 'update' && isset($product['imageUrl'])) {
        // Retain existing image URL if no new image is uploaded
        $imageUrl = $product['imageUrl'];
    }

    if ($action === 'update' && $updateId > 0) {
        // Update product logic
        $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, SKU=?, categoryId=?, brandId=?, ageGroupId=?, stockQuantity=?, imageUrl=?, discount=?, status=? WHERE id=?");
        $stmt->bind_param("ssdsiiiissii", $name, $description, $price, $SKU, $categoryId, $brandId, $ageGroupId, $stockQuantity, $imageUrl, $discount, $status, $updateId);
        if ($stmt->execute()) {
            header('Location: adminHome.php'); // Redirect on success
            exit();
        } else {
            $errorMsg = "Something went wrong while updating the product.";
        }
    } else {
        // Add new product logic
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, SKU, categoryId, brandId, ageGroupId, stockQuantity, imageUrl, discount, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsiiiisis", $name, $description, $price, $SKU, $categoryId, $brandId, $ageGroupId, $stockQuantity, $imageUrl, $discount, $status);
        if ($stmt->execute()) {
            header('Location: adminHome.php'); // Redirect on success
            exit();
        } else {
            $errorMsg = "Something went wrong while adding the product.";
        }
    }
}

// Fetch category, brand, and age group options
$categories = $conn->query("SELECT id, name FROM categories");
$brands = $conn->query("SELECT id, name FROM brands");
$ageGroups = $conn->query("SELECT id, ageGroup FROM agegroup");
$subCategory = $conn->query("SELECT id, name FROM subCategories");

// Fetch product data if updating
if ($action === 'update' && $updateId > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $updateId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        $errorMsg = "Product not found.";
    }
}

// Close the database connection
$conn->close();

// End output buffering
ob_end_flush();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($action === 'update' ? 'Update Product' : 'Add Product'); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            background-image: url('images/teddy_bear_2.avif');
    background-position:center;
    background-repeat: no-repeat;
    background-size: cover;
   

        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 600px;
        }
        h1 {
            text-align: center;
            color: #ff5722;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: #00008b; /* Dark Blue */
            outline: none;
        }
        button {
            background-color: #ff5722;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            display: block;
            width: 97%;
        }
        button:hover {
            background-color: #e64a19;
        }
        input::placeholder,
        textarea::placeholder {
            color: #ff5722; /* Placeholder color */
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
        <h1><?php echo ($action === 'update' ? 'Update Product' : 'Add Product'); ?></h1>
        <?php if (!empty($errorMsg)) { ?>
            <p style="color: red; text-align: center;"><?php echo $errorMsg; ?></p>
        <?php } ?>
<form action="addProducts.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <?php if ($action === 'update') { ?>
        <input type="hidden" name="updateId" value="<?php echo $updateId; ?>">
    <?php } ?>

    <input type="text" name="name" id="name" value="<?php echo isset($product['name']) ? htmlspecialchars($product['name']) : ''; ?>" required placeholder="Enter product name">

    <textarea name="description" id="description" required placeholder="Enter product description"><?php echo isset($product['description']) ? htmlspecialchars($product['description']) : ''; ?></textarea>

    <input type="number" step="0.01" name="price" id="price" value="<?php echo isset($product['price']) ? htmlspecialchars($product['price']) : ''; ?>" required placeholder="Enter price">

    <input type="text" name="SKU" id="SKU" value="<?php echo isset($product['SKU']) ? htmlspecialchars($product['SKU']) : ''; ?>" placeholder="Enter SKU">

    <select name="categoryId" id="categoryId" required>
        <?php while ($row = $categories->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>" <?php echo (isset($product['categoryId']) && $product['categoryId'] == $row['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($row['name']); ?>
            </option>
        <?php } ?>
    </select>

    <select name="brandId" id="brandId" required>
        <?php while ($row = $brands->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>" <?php echo (isset($product['brandId']) && $product['brandId'] == $row['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($row['name']); ?>
            </option>
        <?php } ?>
    </select>

    <select name="ageGroupId" id="ageGroupId" required>
        <?php while ($row = $ageGroups->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>" <?php echo (isset($product['ageGroupId']) && $product['ageGroupId'] == $row['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($row['ageGroup']); ?>
            </option>
        <?php } ?>
    </select>

    <input type="number" name="stockQuantity" id="stockQuantity" value="<?php echo isset($product['stockQuantity']) ? htmlspecialchars($product['stockQuantity']) : ''; ?>" placeholder="Enter stock quantity">

    <input type="file" name="imageUrl" id="imageUrl" <?php echo ($action === 'update' ? '' : 'required'); ?>>

    <input type="number" name="discount" id="discount" value="<?php echo isset($product['discount']) ? htmlspecialchars($product['discount']) : ''; ?>" placeholder="Enter discount">

    <select name="status" id="status" required>
        <option value="active" <?php echo (isset($product['status']) && $product['status'] === 'active') ? 'selected' : ''; ?>>Active</option>
        <option value="inactive" <?php echo (isset($product['status']) && $product['status'] === 'inactive') ? 'selected' : ''; ?>>Inactive</option>
    </select>

    <button type="submit"><?php echo ($action === 'update' ? 'Update Product' : 'Add Product'); ?></button>
</form>

    </div>
</body>
</html>
