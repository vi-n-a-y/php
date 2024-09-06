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

    .brands,.category,.age-group, .customers,.orders,.products-db{
        display: none;
    }
</style>
<body>

<?php

include_once 'header.php';


?>

<div class="container-admin-panel">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <!-- <li><a href="#">Dashboard</a></li> -->
                <li><a href="#">Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <!-- <li><a href="#">Reports</a></li> -->
                <!-- <li><a href="#">User Management</a></li> -->
                <!-- <li><a href="#">Settings</a></li> -->
                <!-- <li><a href="#">Promotions</a></li> -->
            </ul>
        </aside>


        <!-- Main Content -->
        <main class="content">
            <!-- Dashboard -->
            <section class="dashboard">
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
            </section>

            <!-- Products -->
            <section class="products-db">
                <h1>Products</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sample Product</td>
                            <td>Electronics</td>
                            <td>$100</td>
                            <td>50</td>
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>
                        <!-- More rows here -->
                    </tbody>
                </table>
            </section>

            <!-- Orders -->
            <section class="orders">
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

            

            <!-- Customers -->
            <section class="customers">
                <h1>Customers</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total Orders</th>
                            <th>Total Spent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>201</td>
                            <td>Jane Doe</td>
                            <td>jane@example.com</td>
                            <td>5</td>
                            <td>$500</td>
                            <td><button>View</button></td>
                        </tr>
                        <!-- More rows here -->
                    </tbody>
                </table>
            </section>



              <!-- Customers -->
              <section class="brands">
                <h1>Brands</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Brand ID</th>
                            <th>Name</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>301</td>
                            <td>Jane Doe</td>
                           
                            <td><button>view</button></td>
                        </tr>
                        <!-- More rows here -->
                    </tbody>
                </table>
            </section>


            <section class="category">
            <button>Add</button>


                <h1>Category</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Name</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>401</td>
                            <td>Jane Doe</td>

                            <td><button>view</button></td>
                        </tr>
                        <!-- More rows here -->
                    </tbody>
                </table>
            </section>




                    
            <section class="age-group">
            <button>Add</button>


                <h1>Age Group</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Age Group ID</th>
                            <th>Value</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>501</td>
                            <td>3-5</td>

                            <td><button>view</button></td>
                        </tr>
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

$conn->close();
?>






<style>
               .about-us img{
                height:150px;
                width:150px;
               }
               </style>
            <section class="about-us">
            <!-- <button>Add</button> -->


                <h1>About Us</h1>
                <table>
                    <thead>
                        <tr>
                            <th>AboutUs ID</th>
                            <th>created AT</th>
                            <th>Title</th>
                            <th>Content</th> 
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
        echo "<td>1</td><td>{$row["created_at"]}</td><td>{$row["title"]}</td><td>{$row["content"]}</    td><td><img src='{$imagePath}' alt='img' class='profile-pic' loading='lazy'></td>
                            
               <td> <button class='action-btn update-btn'><a class='modify-btn' href='updateId={$row["id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                <button class='action-btn delete-btn'><a class='modify-btn'  onclick='confirmDelete(event, {$row["id"]})'> <i class='fa-solid fa-trash'></i></a></button></td>
            "
             

                        ?>
                            
                        </tr>
                        <!-- More rows here -->
                    </tbody>
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
