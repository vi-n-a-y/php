<?php
session_start();
if (!isset($_SESSION['adminLogin'])) {
    header("Location: Home.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminHome.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>

</head>

<style>
    /* .content{
        display: none;
    } */

    /* .brands,.category,.age-group, .customers,.orders,.products-db{
        display: none;
    } */



    .action-btn {
        margin-bottom: 10px;
    }



    /* styles.css */
    .nav-a-div {
        font-family: Arial, sans-serif;
        display: flex;
        /* flex-direction: ; */
    }




    nav {

        min-height: 100vh;
        max-height: 200vh;
        width: 190px;
        background: #333;
        color: #fff;
        padding: 10px;
        font-size: 20px;
    }


    .section-ul {
        display: flex;
        flex-direction: column;
    }

    nav ul {
        list-style: none;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 10px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 10px;
    }

    .nav-a.active {
        font-weight: bold;
        /* text-decoration: underline; */
        background-color: white;
        color: black;
    }

    .section {
        display: none;
        padding: 20px;
    }

    .section.active {
        display: block;
    }




 
                            .add-btn-admin {
                                display: flex;
                                justify-content: space-between;

                            }

                            .add-btn-admin a {
                                text-decoration: none;
                                color: white;
                            }

                            .add-btn-admin a:hover {
                                color: blue;
                            }


                            .add-btn-admin button {
                                display: block;
                                padding: 15px;
                                margin-bottom: 5px;
                            }


                            .modify-btn {
                                color: white;
                            }

                            .update-btn a:hover {
                                color: orange;
                            }

                            .delete-btn a:hover {
                                color: red;
                            }
                        
</style>


<body>

    <!-- <?php

            // include_once 'header.php';


            ?> -->



        <div class="toys-header-container">

            <div class="white-shade-toy-header">
                <div class="call">
                    <i class="fa-solid fa-phone-volume"></i>
                    <a href="tel:1234567890">1234567890</a>
                </div>
                <div class="call">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:toysstoreinfo@test.com">toysstoreinfo@test.com</a>
                </div>
            </div>

            <div class="bg-black-header">
                <h3 class="toy-text-header">Toys-Shop</h3>

                <input type="text" name="search_header" id="search_header" class="search_header">
                <button class="search-btn-header">Search</button>
                <!-- <div class="love-icon-header"><i class="fa-regular fa-heart"></i></div> -->
                <div class="wishlist-icon-header">
                    <a class='modify-btn' href="import.php"><i class="fa-solid fa-file-import"></i></a>

                </div>

                <div class="wishlist-icon-header">

                    <a class='modify-btn' href="downloadRecordFile.php"> <i class="fa-solid fa-download"></i></a>
                </div>
                <div class="wishlist-icon-header">
                    <a class='modify-btn' href="index.php"> <i class="fa-solid fa-house"></i></a>
                </div>
                <div class="wishlist-icon-header">
                    <a class='modify-btn' href="home.php"> <i class="fa-solid fa-right-from-bracket"></i>
                </div>



            </div>


            <!-- <div class="nav-btns">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="aboutUs.php">about</a>
                    </li>
                    <li>
                        <a href="#">shop now</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">WishList</a>
                    </li>
                    <li>
                        <a href="myAccount.php">my account </a>
                    </li>

                </ul>
            </div> -->

        </div>


    <div class="container-admin-panel">


        <div class="nav-a-div">

            <nav>
                <ul class="section-ul">
                    <li><a href="#" class="nav-a" data-target="section1">Products</a></li>
                    <li><a href="#" class="nav-a" data-target="section2">Customers</a></li>
                    <li><a href="#" class="nav-a" data-target="section3">Brands</a></li>
                    <!-- <li><a href="#" class="nav-a" data-target="section4">Orders</a></li> -->
                    <li><a href="#" class="nav-a" data-target="section5">Category</a></li> 
                    <li><a href="#" class="nav-a" data-target="section6">Age Group</a></li>
                   
                    <li><a href="addSubCategory.php" class="nav-a" data-target="section8">Sub-Category</a></li>
                    <li><a href="#" class="nav-a" data-target="section9">Contact Us</a></li>
                    <li><a href="#" class="nav-a" data-target="section7">About Us</a></li>
                </ul>
            </nav>


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

       








            <!-- Main Content -->
            <main class="content">
                <!-- Dashboard -->
                <!-- <section class="dashboard">
                <h1>Overview</h1>
                <div class="stats">
                    <div class="stat-item">
                        <h3>Total Sales</h3>
                        <p>$5000</p>
                    </div>
                    <div class="stat-item">
                        <h3>Total Orders</h3>
                        <p>120</p>
                    </div>
                    <div class="stat-item">
                        <h3>Total Products</h3>
                        <p>250</p>
                    </div>
                    <div class="stat-item">
                        <h3>New Customers</h3>
                        <p>45</p>
                    </div>
                </div>
            </section> -->

                <!-- Products -->
                <section id="section1" class="section products-db">



                <style>
                    /* General Table Styling */




/* Image Styling */
.products-db-td img {
    border-radius: 4px;
}
/* Pagination Controls Styling */
.pagination-controls {
    text-align: center;
    margin-top: 1rem;
}

.pagination-btn {
    margin: 0 0.25rem;
    padding: 0.5rem 1rem;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    color: #333;
    cursor: pointer;
    font-size: 0.875rem; /* Adjust font size as needed */
}

.pagination-btn.active {
    background-color: black;
    color: white;
    border-color: #007bff;
}

/* Style for Previous and Next buttons */
.pagination-btn.previous, .pagination-btn.next {
    background-color: black;
    color: white;
}

.pagination-btn.previous:disabled, .pagination-btn.next:disabled {
    background-color: #333; /* Darker color for disabled state */
    color: #888; /* Lighter color for disabled text */
    border-color: #333;
    cursor: not-allowed;
}


                </style>
    <?php
    include_once 'db_connect.php';
    // Fetch the products data
    $sql = "
    SELECT 
        p.id AS productId,
        p.name AS productName,
        p.description,
        p.price,
        p.SKU,
        p.stockQuantity,
        p.imageUrl,
        p.discount,
        p.createdAt,
        p.updatedAt,
        p.status,
        c.name AS categoryName,
        b.name AS brandName,
        ag.ageGroup AS ageGroupName
    FROM 
        products p
        INNER JOIN categories c ON p.categoryId = c.id
        INNER JOIN brands b ON p.brandId = b.id
        INNER JOIN agegroup ag ON p.ageGroupId = ag.id
    ";

    $result = $conn->query($sql);
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }
    ?>

    <div class="add-btn-admin">
        <h1>Products</h1>
        <button><a href="addProducts.php"><i class="fa-solid fa-plus"></i></a></button>
    </div>

    <table class="products-db-table">
        <thead>
            <tr>
                <th class="products-db-th" data-sort="productId">Product ID</th>
                <th class="products-db-th" data-sort="productName">Product Name</th>
                <!-- <th class="products-db-th" data-sort="description">Description</th> -->
                <th class="products-db-th" data-sort="price">Price</th>
                <th class="products-db-th" data-sort="SKU">SKU</th>
                <th class="products-db-th" data-sort="stockQuantity">Stock Quantity</th>
                <th class="products-db-th" data-sort="imageUrl">Image URL</th>
                <th class="products-db-th" data-sort="discount">Discount</th>
                <!-- <th class="products-db-th" data-sort="updatedAt">Updated At</th> -->
                <th class="products-db-th" data-sort="status">Status</th>
                <th class="products-db-th" data-sort="categoryName">Category Name</th>
                <th class="products-db-th" data-sort="brandName">Brand Name</th>
                <th class="products-db-th" data-sort="ageGroupName">Age Group</th>
                <th class="products-db-th">Action</th>
            </tr>
        </thead>

        <tbody id="productBody">
            <?php if (!empty($rows)): ?>
                <?php foreach ($rows as $index => $row): ?>
                    <?php $imagePath = 'images/' . htmlspecialchars($row["imageUrl"], ENT_QUOTES, 'UTF-8'); ?>
                    <tr>
                        <td class="products-db-td"><?= $index + 1 ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['productName'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['SKU'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['stockQuantity'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><img src='<?= $imagePath ?>' height='50px' width='50px' alt='Product Image'></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['discount'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['categoryName'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['brandName'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td"><?= htmlspecialchars($row['ageGroupName'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="products-db-td">
                            <button class='action-btn update-btn'><a class='modify-btn' href='addProducts.php?type=update&updateId=<?= $row["productId"] ?>'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                            <button class='action-btn delete-btn'><a class='modify-btn' href='addProducts.php?type=delete&deleteId=<?= $row["productId"] ?>' onclick='confirmDelete(event, "Are you sure you want to delete this product?")'> <i class='fa-solid fa-trash'></i></a></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td class="products-db-td" colspan="12">No content available.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination Controls -->
    <div id="paginationControls" class="pagination-controls"></div>

    <!-- <script src="pagination.js"></script> -->


    <script src="sort.js"></script>
</section>





                <!-- Customers -->
                <section id="section2" class="section customers">

                    <?php
                    include_once 'db_connect.php';
                    // Fetch the About Us content
                    $customers = "SELECT * FROM customers";
                    $customerResult = $conn->query($customers);


                    if ($customerResult->num_rows > 0) {
                    ?>






                        <div class="add-btn-admin">


                            <h1>Customers</h1>
                            <button><a href="addCustomer.php"><i class="fa-solid fa-plus"></i></a></button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Update At</th>
                                    <th>Name</th>
                                    <th>DOB</th>

                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Profile</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tr>
                                <?php
                                $i = 0;
                                while ($customerRow = $customerResult->fetch_assoc()) {
                                    $i++;
                                    $customerImagePath = 'images/' . htmlspecialchars($customerRow["profilePic"], ENT_QUOTES, 'UTF-8');

                                    $name = $customerRow["firstName"] . " " . $customerRow["lastName"];

                                    echo "<td>{$i}</td><td>{$customerRow["updateAt"]}</td><td>{$name}</td><td>{$customerRow["dob"]}</td><td>{$customerRow["email"]}</td><td>{$customerRow["number"]}</td><td><img src='{$customerImagePath}' alt='img' heigh='200' width='100' class='profile-pic' loading='lazy'></td>
                     <td> <button class='action-btn update-btn'><a class='modify-btn' href='addCustomer.php?type=update&updateId={$customerRow["id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addCustomer.php?type=delete&deleteId={$customerRow["id"]}' onclick='confirmDelete(event, \"Are you sure you want to delete this User?\")'> <i class='fa-solid fa-trash'></i></a></button></td>";


                                ?>



                            </tr>
                    <?php
                                }
                            } else {
                                echo "No content available.";
                            }

                    ?>
                        </table>
                </section>



                <!-- Customers -->
                <section id="section3" class="section brands">

                    <?php
                    include_once 'db_connect.php';
                    // Fetch the About Us content
                    $brands = "SELECT * FROM brands";
                    $brandResult = $conn->query($brands);


                    if ($brandResult->num_rows > 0) {
                    ?>
                        <div class="add-btn-admin">


                            <h1>Brands</h1>
                            <button><a href="addBrands.php"><i class="fa-solid fa-plus"></i></a></button>
                        </div>




                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $i = 0;
                                    while ($brandRow = $brandResult->fetch_assoc()) {
                                        $i++;




                                        echo "<td>{$i}</td><td>{$brandRow["name"]}</td>
                     <td> <button class='action-btn update-btn'><a class='modify-btn' href='addBrands.php?type=update&updateId={$brandRow["id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addBrands.php?type=delete&deleteId={$brandRow["id"]}' onclick='confirmDelete(event, \"Are you sure you want to delete this Brand?\")'> <i class='fa-solid fa-trash'></i></a></button></td>";


                                    ?>



                                </tr>
                        <?php
                                    }
                                } else {
                                    echo "No content available.";
                                }

                        ?>
                        </table>
                </section>



                <section id="section4" class="section orders">
                    <h1>Orders</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>101</td>
                                <td>John Doe</td>
                                <td>2024-09-01</td>
                                <td>$200</td>
                                <td>Pending</td>
                                <td><button>View</button></td>
                            </tr>
                            <!-- More rows here -->
                        </tbody>
                    </table>
                </section>


                <section id="section5" class="section category">



                    <?php
                    include_once 'db_connect.php';
                    // Fetch the About Us content
                    $categories = "SELECT * FROM categories";
                    $categorieResult = $conn->query($categories);


                    if ($categorieResult->num_rows > 0) {
                    ?>
                        <div class="add-btn-admin">


                            <h1>Category</h1>
                            <button><a href="addCategories.php"><i class="fa-solid fa-plus"></i></a></button>
                        </div>



                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $i = 0;
                                    while ($categoriesRow = $categorieResult->fetch_assoc()) {
                                        $i++;




                                        echo "<td>{$i}</td><td>{$categoriesRow["name"]}</td>
                     <td> <button class='action-btn update-btn'><a class='modify-btn' href='addCategories.php?type=update&updateId={$categoriesRow["id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addCategories.php?type=delete&deleteId={$categoriesRow["id"]}' onclick='confirmDelete(event, \"Are you sure you want to delete this Order?\")'> <i class='fa-solid fa-trash'></i></a></button></td>";


                                    ?>



                                </tr>
                        <?php
                                    }
                                } else {
                                    echo "No content available.";
                                }

                        ?>
                        </table>
                </section>









                <section id="section6" class="section age-group">



                    <?php
                    include_once 'db_connect.php';
                    // Fetch the About Us content
                    $ageGroup = "SELECT * FROM ageGroup";
                    $ageResult = $conn->query($ageGroup);

                    $i = 0;
                    if ($ageResult->num_rows > 0) {
                    ?>
      








                        <div class="add-btn-admin">


                            <h1>Age Group</h1>
                            <button><a href="addAgeGroup.php"><i class="fa-solid fa-plus"></i></a></button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Value</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    while ($ageRow = $ageResult->fetch_assoc()) {
                                        $i++;




                                        echo "<td>{$i}</td><td>{$ageRow["ageGroup"]}</td>
                     <td> <button class='action-btn update-btn'><a class='modify-btn' href='addAgeGroup.php?type=update&updateId={$ageRow["id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addAgeGroup.php?type=delete&deleteId={$ageRow["id"]}' onclick='confirmDelete(event, \"Are you sure you want to delete this Age Group?\")'> <i class='fa-solid fa-trash'></i></a></button></td>";


                                    ?>



                                </tr>
                        <?php
                                    }
                                } else {
                                    echo "No content available.";
                                }

                        ?>
                        <!-- More rows here -->
                            </tbody>
                        </table>
                </section>





                <section id="section9" class="section age-group">



<?php
include_once 'db_connect.php';
// Fetch the About Us content
$contact = "SELECT * FROM contactUs";
$contactResult = $conn->query($contact);

$i = 0;
if ($contactResult->num_rows > 0) {
?>

    <div class="add-btn-admin">


        <h1>Contact Us</h1>
       
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Update At</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                while ($contactRow = $contactResult->fetch_assoc()) {
                    $i++;




                    echo "<td>{$i}</td><td>{$contactRow["createdAt"]}</td><td>{$contactRow["name"]}</td><td>{$contactRow["email"]}</td><td>{$contactRow["message"]}</td>
                    <td> <button class='action-btn update-btn'><a class='modify-btn' href='mailto:{$contactRow["email"]}' > <i class='fa-solid fa-reply'></i></a></button>
                    ";
                    // <button class='action-btn delete-btn'><a class='modify-btn'  href='addcontactUs.php?type=delete&deleteId={$contactRow["id"]}'   onclick='confirmDelete(event, \"Are you sure you want to delete this Message?\")'> <i class='fa-solid fa-trash'></i></a></button></td>


                ?>



            </tr>
    <?php
                }
            } else {
                echo "No content available.";
            }

    ?>
    <!-- More rows here -->
        </tbody>
    </table>
</section>






                <?php
                include_once 'db_connect.php';
                // Fetch the About Us content
                $sql = "SELECT * FROM aboutUs ORDER BY created_at DESC LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of the most recent row
                    $row = $result->fetch_assoc();
                    $imagePath = 'images/' . htmlspecialchars($row["aboutFile"], ENT_QUOTES, 'UTF-8');

                    // echo "<h1>" . htmlspecialchars($row["title"]) . "</h1>";
                    // echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
                    // // echo "<img  src={$imagePath}>";

                    // echo $imagePath;
                    // echo $row["aboutFile"];


                } else {
                    echo "No content available.";
                }


                ?>






                <style>
                    .about-us img {
                        height: 150px;
                        width: 150px;
                    }
                </style>
                <section id="section7" class="section about-us">
                    <!-- <button>Add</button> -->


                    <h1>About Us</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>AboutUs ID</th>
                                <th>created AT</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Description</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                           <style>
                            .abt-over-flow-hidden{
                                /* display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical; */
                                overflow-y: auto;
                                /* text-overflow: ellipsis;
                                white-space: normal; */
                                height: 100px;
                            }
                           </style>

                            

                                <?php

                                
                                echo "<td>1</td><td>{$row["created_at"]}</td><td>{$row["title"]}</td><td class='abt-over-flow-hidden'>{$row["content"]}</    td><td class='abt-over-flow-hidden'>{$row["content1"]}</    td><td><img src='{$imagePath}' alt='img' class='profile-pic' loading='lazy'></td>
                            
               <td> <button class='action-btn update-btn'><a class='modify-btn' > <i class='fa-regular fa-pen-to-square'></i> </a></button>
                <button class='action-btn delete-btn'><a class='modify-btn'  onclick='confirmDelete(event, {$row["id"]})'> <i class='fa-solid fa-trash'></i></a></button></td>";


                                ?>

                            </tr>
                            <!-- More rows here -->
                        </tbody>
                    </table>
                </section>





                <section id="section8" class="section customers">

<?php
include_once 'db_connect.php';

$sql = "
    SELECT
        subcategories.id AS subcategory_id,
        subcategories.name AS subcategory_name,
        categories.name AS category_name
    FROM
        subcategories
        INNER JOIN categories ON subcategories.categoryId = categories.id
";

$result = $conn->query($sql);
?>
<style>

    /* Pagination container */
.pagination.sub-cat-page-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px 0;
}

/* Pagination links */
.pagination.sub-cat-page-pagination a {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 5px;
    text-decoration: none;
    color: #333;
    border: 1px solid white;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

/* Hover effect for pagination links */
.pagination.sub-cat-page-pagination a:hover {
    background-color: black;
    color: white;
}

/* Active page style */
.pagination.sub-cat-page-pagination a.active {
    font-weight: bold;
    color: white;
    background-color: black;
    /* border-color: #007bff; */
}

/* Pagination buttons */
.pagination-btn.sub-cat-page-prev-btn,
.pagination-btn.sub-cat-page-next-btn {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 5px;
    text-decoration: none;
    color: #007bff;
    border: 1px solid #007bff;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
    cursor: pointer;
}

/* Disabled state */
.pagination-btn.sub-cat-page-prev-btn[disabled],
.pagination-btn.sub-cat-page-next-btn[disabled] {
    color: #6c757d;
    border-color: #6c757d;
    cursor: not-allowed;
}

/* Hover effect for pagination buttons */
.pagination-btn.sub-cat-page-prev-btn:hover:not([disabled]),
.pagination-btn.sub-cat-page-next-btn:hover:not([disabled]) {
    /* background-color: #007bff; */
    color: white;
}

/* Previous button */
.sub-cat-page-prev-btn {
    font-size: 0.9em;
}

/* Next button */
.sub-cat-page-next-btn {
    font-size: 0.9em;
}



</style>

    <div class="add-btn-admin">
        <h1>Customers</h1>
        <button><a href="addSubCategory.php"><i class="fa-solid fa-plus"></i></a></button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Sub-Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="sub-cat-table-body">
            <?php
            if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['category_name']}</td>
                        <td>{$row['subcategory_name']}</td>
                        <td>
                            <button class='action-btn update-btn'>
                                <a class='modify-btn' href='addSubCategory.php?type=update&updateId={$row['subcategory_id']}'>
                                    <i class='fa-regular fa-pen-to-square'></i>
                                </a>
                            </button>
                            <button class='action-btn delete-btn'>
                                <a class='modify-btn' href='addSubCategory.php?type=delete&deleteId={$row['subcategory_id']}' onclick='confirmDelete(event, \"Are you sure you want to delete this Sub-Category?\")'>
                                    <i class='fa-solid fa-trash'></i>
                                </a>
                            </button>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No content available.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination Controls -->
    <div class="pagination sub-cat-page-pagination">
        <a href="#" class="pagination-btn sub-cat-page-prev-btn" id="prev-btn">« Previous</a>
        <span id="page-numbers" class="sub-cat-page-numbers"></span>
        <a href="#" class="pagination-btn sub-cat-page-next-btn" id="next-btn">Next »</a>
    </div>
</section>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5; // Number of rows to display per page
    const tableBody = document.getElementById('sub-cat-table-body');
    const rows = tableBody.querySelectorAll('tr');
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    let currentPage = parseInt(new URLSearchParams(window.location.search).get('page')) || 1;

    function showPage(page) {
        rows.forEach((row, index) => {
            row.style.display = (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) ? '' : 'none';
        });
    }

    function updatePaginationControls() {
        const pageNumbers = document.getElementById('page-numbers');
        pageNumbers.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.textContent = i;
            if (i === currentPage) pageLink.classList.add('active');
            pageLink.addEventListener('click', (event) => {
                event.preventDefault();
                currentPage = i;
                updatePaginationControls();
                showPage(currentPage);
                window.history.replaceState(null, '', `?page=${currentPage}`);
            });
            pageNumbers.appendChild(pageLink);
        }

        document.getElementById('prev-btn').style.display = (currentPage > 1) ? '' : 'none';
        document.getElementById('next-btn').style.display = (currentPage < totalPages) ? '' : 'none';
    }

    document.getElementById('prev-btn').addEventListener('click', function(event) {
        if (currentPage > 1) {
            currentPage--;
            updatePaginationControls();
            showPage(currentPage);
            window.history.replaceState(null, '', `?page=${currentPage}`);
        }
        event.preventDefault();
    });

    document.getElementById('next-btn').addEventListener('click', function(event) {
        if (currentPage < totalPages) {
            currentPage++;
            updatePaginationControls();
            showPage(currentPage);
            window.history.replaceState(null, '', `?page=${currentPage}`);
        }
        event.preventDefault();
    });

    showPage(currentPage);
    updatePaginationControls();
});
</script>


            </main>

        </div>
</body>


<script>
    function confirmDelete(event, id) {
        event.preventDefault(); // Prevent the default action (e.g., form submission or 
        if (confirm("Really want to Delete this User?")) {
            // If user clicks "Yes", redirect to the delete PHP script with the item ID
            window.location.href = 'delete.php?deleteId=' + id;
        }

        // If user clicks "No", do nothing
    }



    function confirmDelete(event, message) {
        if (!confirm(message)) {
            event.preventDefault();  // Prevent the default action (navigation)
        }
    }

</script>

</html>