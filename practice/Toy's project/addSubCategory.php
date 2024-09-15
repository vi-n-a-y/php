<?php

// Start output buffering
ob_start();

// Include database connection
require 'db_connect.php';




if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
    $subcategories = $conn->query("SELECT * FROM subcategories WHERE categoryId = $category_id");

    echo '<option value="">Select Subcategory</option>';
    while ($row = $subcategories->fetch_assoc()) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
}





// Initialize variables
$action = isset($_GET['type']) ? $_GET['type'] : '';
$updateId = isset($_GET['updateId']) ? intval($_GET['updateId']) : 0;
$errorMsg = '';
// $product = []; // Initialize product array

if (isset($_GET['type']) && $_GET['type'] === 'delete' && isset($_GET['deleteId']) && $_GET['deleteId'] > 0) {
    $deleteId = intval($_GET['deleteId']);

    $sql = "DELETE FROM `subCategories` WHERE id=?";
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryValue = $_POST['categoryId'];
    $subCategoryName = $_POST['subCategory'];

    if ($action === 'update' && $updateId > 0) {
        // Update product logic
        $stmt = $conn->prepare("UPDATE subCategories SET name=?,categoryId=?  WHERE id=?");
        $stmt->bind_param("sii", $subCategoryName, $categoryValue,  $updateId);
        if ($stmt->execute()) {
            header('Location: adminHome.php'); // Redirect on success
            exit();
        } else {
            $errorMsg = "Something went wrong while updating the product.";
        }
    } else {
        // Add new product logic
        $stmt = $conn->prepare("INSERT INTO subCategories (name,categoryId) VALUES (?, ?)");
        $stmt->bind_param("si", $subCategoryName, $categoryValue);
        if ($stmt->execute()) {
            header('Location: adminHome.php'); // Redirect on success
            exit();
        } else {
            $errorMsg = "Something went wrong while adding the product.";
        }
    }
}

$categories = $conn->query("SELECT id, name FROM categories");

if ($action === 'update' && $updateId > 0) {
    $stmt = $conn->prepare("SELECT * FROM subCategories WHERE id = ?");
    $stmt->bind_param("i", $updateId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $subCat = $result->fetch_assoc();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($action === 'update' ? 'Update Sub-Category' : 'Add Sub-Category'); ?></title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">


<style>
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
        width: 100%;
        max-width: 600px;
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
    }

    .form-container button {

        width: 94%;
    }

    .form-container h1 {
        width: 94%;
        margin: 15px 0;
    }

  
</style>






<body>

    <?php include_once 'adminHeader.php';  ?>
    <div class="container-admin-panel">






        <main class="content">

            <section id="section8" class="section products-db">









                <div class="form-container">
                    <h1><?php echo ($action === 'update' ? 'Update Sub-category' : 'Add Sub-Category'); ?></h1>
                    <?php if (!empty($errorMsg)) { ?>
                        <p style="color: red; text-align: center;"><?php echo $errorMsg; ?></p>
                    <?php } ?>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="<?php echo $action; ?>">
                        <?php if ($action === 'update') { ?>
                            <input type="hidden" name="updateId" value="<?php echo $updateId; ?>">
                        <?php } ?>

                        <input type="text" name="subCategory" id="name" value="<?php echo isset($subCat['name']) ? htmlspecialchars($subCat['name']) : ''; ?>" required placeholder="Enter Sub-Category Name">



                        <select name="categoryId" id="categoryId" required>
                            <?php while ($row = $categories->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id']; ?>" <?php echo (isset($subCat['categoryId']) && $subCat['categoryId'] == $row['id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($row['name']); ?>
                                </option>
                            <?php } ?>
                        </select>




                        <button  class="submit-btn" type="submit"><?php echo ($action === 'update' ? 'Update Sub-Category' : 'Add Sub-Category'); ?></button>
                    </form>

                </div>



















            </section>

        </main>
    </div>

    

</body>
<script src="sideBar.js"></script>
</html>