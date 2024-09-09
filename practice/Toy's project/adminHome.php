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
        display: inline-block;
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
                    <li><a href="#" class="nav-a" data-target="section7">About Us</a></li>
                    <!-- <li><a href="addSubCategory.php" class="nav-a" data-target="section8">Sub-Category</a></li> -->
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

                    <?php
                    include_once 'db_connect.php';
                    // Fetch the About Us content
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


                    if ($result->num_rows > 0) {
                    ?>


                        <div class="add-btn-admin">


                            <h1>Products</h1>
                            <button><a href="addProducts.php"><i class="fa-solid fa-plus"></i></a></button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th data-sort="productId">Product ID</th>
                                    <th data-sort="productName">Product Name</th>
                                    <th data-sort="description">Description</th>
                                    <th data-sort="price">Price</th>
                                    <th data-sort="SKU">SKU</th>
                                    <th data-sort="stockQuantity">Stock Quantity</th>
                                    <th data-sort="imageUrl">Image URL</th>
                                    <th data-sort="discount">Discount</th>
                                    <th data-sort="updatedAt">Updated At</th>
                                    <th data-sort="status">Status</th>
                                    <th data-sort="categoryName">Category Name</th>
                                    <th data-sort="brandName">Brand Name</th>
                                    <th data-sort="ageGroupName">Age Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php
                                    $i = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $imagePath = 'images/' . htmlspecialchars($row["imageUrl"], ENT_QUOTES, 'UTF-8');
                                        // <td>{$row['productId']}</td>
                                        $i++;
                                        echo "
                                                
                                                <td>{$i}</td>
                                                <td>{$row['productName']}</td>
                                                <td>{$row['description']}</td>
                                                <td>{$row['price']}</td>
                                                <td>{$row['SKU']}</td>
                                                <td>{$row['stockQuantity']}</td>
                                                 <td><img src='{$imagePath}' height='50px' width='50px' alt='some'></td>
                                                <td>{$row['discount']}</td>
                                               
                                                <td>{$row['updatedAt']}</td>
                                                <td>{$row['status']}</td>
                                                <td>{$row['categoryName']}</td>
                                                <td>{$row['brandName']}</td>
                                                <td>{$row['ageGroupName']}</td>
                                                <td><button  class='action-btn update-btn'><a class='modify-btn' href='addProducts.php?type=update&updateId={$row["productId"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                                                     <button class='action-btn delete-btn'><a class='modify-btn'  href='addProducts.php?type=delete&deleteId={$row["productId"]}'> <i class='fa-solid fa-trash'></i></a></button></td>
                                              ";




                                    ?>



                                </tr>
                        <?php
                                    }
                                } else {
                                    echo '<button><a href="addProducts.php"><i class="fa-solid fa-plus"></i></a></button>';

                                    echo "No content available.";
                                }

                        ?>
                            </tbody>
                        </table>
                </section>
                <script src="sort.js"></script>
                <!-- Orders -->




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
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addCustomer.php?type=delete&deleteId={$customerRow["id"]}'> <i class='fa-solid fa-trash'></i></a></button></td>";


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
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addBrands.php?type=delete&deleteId={$brandRow["id"]}'> <i class='fa-solid fa-trash'></i></a></button></td>";


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
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addCategories.php?type=delete&deleteId={$categoriesRow["id"]}'> <i class='fa-solid fa-trash'></i></a></button></td>";


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
                <button class='action-btn delete-btn'><a class='modify-btn'  href='addAgeGroup.php?type=delete&deleteId={$ageRow["id"]}'> <i class='fa-solid fa-trash'></i></a></button></td>";


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
                                <!-- <td></td>
                            <td></td>
                            <td></td> -->

                                <?php

                                // {$row["id"]}
                                echo "<td>1</td><td>{$row["created_at"]}</td><td>{$row["title"]}</td><td>{$row["content"]}</    td><td>{$row["content1"]}</    td><td><img src='{$imagePath}' alt='img' class='profile-pic' loading='lazy'></td>
                            
               <td> <button class='action-btn update-btn'><a class='modify-btn' href='updateId={$row["id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
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
// Fetch the About Us content
$sql = "SELECT
subcategories.id AS subcategory_id,
subcategories.name AS subcategory_name,
categories.name AS category_name
FROM
subcategories
INNER JOIN
categories
ON
subcategories.categoryId = categories.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

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
        <tr>
            <?php
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;



                echo "<td>{$i}</td><td>{$row["category_name"]}</td><td>{$row["subcategory_name"]}</td>
<td> <button class='action-btn update-btn'><a class='modify-btn' href='addSubCategory.php?type=update&updateId={$row["subcategory_id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
<button class='action-btn delete-btn'><a class='modify-btn'  href='addSubCategory.php?type=delete&deleteId={$row["subcategory_id"]}'> <i class='fa-solid fa-trash'></i></a></button></td>";


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
</script>

</html>