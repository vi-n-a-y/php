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
<body>

<?php

include_once 'header.php';


?>

<div class="container-admin-panel">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">User Management</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Promotions</a></li>
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
                            <td>501</td>
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
        </main>
    </div>
</body>
</html>
