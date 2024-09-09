<?php

// Start output buffering
ob_start();

// Include database connection
require 'db_connect.php';

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
    $categoryValue = $_POST['category'];
    $subCategoryName = $_POST['subCategory'];

    if ($action === 'update' && $updateId > 0) {
        // Update product logic
        $stmt = $conn->prepare("UPDATE subCategories SET name=?,categoryId=?  WHERE id=?");
        $stmt->bind_param("sii", $subCategoryName,$categoryValue,  $updateId);
        if ($stmt->execute()) {
            header('Location: adminHome.php'); // Redirect on success
            exit();
        } else {
            $errorMsg = "Something went wrong while updating the product.";
        }
    } else {
        // Add new product logic
        $stmt = $conn->prepare("INSERT INTO subCategories (name,categoryId) VALUES (?, ?)");
        $stmt->bind_param("si",$subCategoryName,$categoryValue );
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






<body>
   <div>
   <?php include_once 'adminHeader.php';  ?>
   <?php include_once 'sidebar.php';  ?>
   </div>


<div>
<section id="section1" class="section products-db">
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, molestias cumque. Expedita fugiat, autem dolores, molestias eligendi vitae saepe praesentium, facilis nam soluta eius aperiam sapiente perspiciatis qui nobis sed.
</p>

   </section>
</div>









    
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-a');
        const sections = document.querySelectorAll('.section');

        // Function to show the selected section and hide others
        function showSection(targetId) {
            sections.forEach(section => {
                if (section.id === targetId) {
                    section.classList.add('active');
                } else {
                    section.classList.remove('active');
                }
            });

            navLinks.forEach(link => {
                if (link.getAttribute('data-target') === targetId) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // Set up click event handlers for the navigation links
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetId = link.getAttribute('data-target');
                showSection(targetId);
                // Optionally, remember the last active section in localStorage
                localStorage.setItem('activeSection', targetId);
            });
        });

        // Show the section that was last active, if any
        const lastActiveSection = localStorage.getItem('activeSection');
        if (lastActiveSection) {
            showSection(lastActiveSection);
        } else {
            // Optionally, show the first section by default
            if (sections.length > 0) {
                showSection(sections[0].id);
            }
        }
    });
</script>
</html>
    






