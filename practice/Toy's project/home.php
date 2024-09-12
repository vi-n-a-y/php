<?php
include 'db_connect.php';

// Fetch categories
$categoriesQuery = "SELECT DISTINCT name FROM categories";
$categoriesResult = $conn->query($categoriesQuery);

// Fetch brands
$brandsQuery = "SELECT DISTINCT name FROM brands";
$brandsResult = $conn->query($brandsQuery);

// Fetch age groups
$ageGroupsQuery = "SELECT DISTINCT ageGroup FROM agegroup";
$ageGroupsResult = $conn->query($ageGroupsQuery);

// Fetch products
$productsQuery = "SELECT 
                    p.id AS productId,
                    p.name AS productName,
                    p.price,
                    p.imageUrl,
                    b.name AS brandName,
                    c.name AS productCategory,
                    a.ageGroup AS ageGroup
                  FROM 
                    products p
                    INNER JOIN brands b ON p.brandId = b.id
                    INNER JOIN categories c ON p.categoryId = c.id
                    INNER JOIN agegroup a ON p.ageGroupId = a.id";


$productsResult = $conn->query($productsQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
}

.main-content {
    display: flex;
    flex-direction: row;
    margin: 20px;
}

/* Accordion (Filter) Section */
.filters {
    width: 20%; /* Adjusted width for better spacing */
    background-color: #f9f9f9;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-right: 20px; /* Spacing between filter and product section */
}

.accordion {
    border: none; /* Removed border for cleaner look */
}

.accordion-item {
    margin-bottom: 10px;
    border-radius: 5px;
    overflow: hidden;
    background-color: #fff; /* White background for better contrast */
}

.accordion-header {
    background-color: #f1f1f1;
    padding: 12px;
    cursor: pointer;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.accordion-body {
    display: none;
    padding: 10px;
    background-color: #fff;
}

.accordion-body a {
    display: block;
    margin-bottom: 5px;
    color: #333;
    text-decoration: none;
}

.accordion-body a:hover {
    text-decoration: underline;
}

.accordion-header i {
    transition: transform 0.2s ease;
}

.accordion-header.active i {
    transform: rotate(180deg);
}

/* Product Section */
.section-p1 {
    flex: 1; /* Allow product section to take up remaining space */
    padding: 20px;
    background-color: #f5f5f5;
}

.pro-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-around; /* Distribute space around product items */
}

.pro {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    width: calc(25% - 20px); /* Adjust the width for 4 products in a row */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.pro img {
    width: 100%; /* Make the image span the entire width of its container */
    height: 200px; /* Set a uniform height for all images */
    object-fit: cover; /* Make the image cover the container while maintaining its aspect ratio */
    border-bottom: 1px solid #ddd;
    margin-bottom: 10px;
    border-radius: 5px;
}


.des {
    margin-bottom: 10px;
}

.star i {
    color: gold;
}

.cart {
    color: #333;
    font-size: 24px;
    cursor: pointer;
}

.pro-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start; /* Adjust to start displaying products one after another */
}

.pro {
    flex: 1 1  50px;
    margin-bottom: 20px; /* Adjust spacing as needed */
}


    /* Your existing styles here */
</style>

<body>
    <?php include 'header.php'; ?>

    <div class="main-content">
        <div class="filters">
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">Category <i class="fa fa-chevron-down"></i></div>
                    <div class="accordion-body">
                        <?php while ($category = $categoriesResult->fetch_assoc()): ?>
                            <a href="#" class="filter-link" data-filter="category-<?php echo htmlspecialchars($category['name']); ?>">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Age <i class="fa fa-chevron-down"></i></div>
                    <div class="accordion-body">
                        <?php while ($ageGroup = $ageGroupsResult->fetch_assoc()): ?>
                            <a href="#" class="filter-link" data-filter="age-<?php echo htmlspecialchars($ageGroup['ageGroup']); ?>">
                                <?php echo htmlspecialchars($ageGroup['ageGroup']); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">Brand <i class="fa fa-chevron-down"></i></div>
                    <div class="accordion-body">
                        <?php while ($brand = $brandsResult->fetch_assoc()): ?>
                            <a href="#" class="filter-link" data-filter="brand-<?php echo htmlspecialchars($brand['name']); ?>">
                                <?php echo htmlspecialchars($brand['name']); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

        <section id="product1" class="section-p1">
            <h2 class="feature-products-text">Kids Products</h2>
            <p>Summer Collection New Modern Design</p>
            <div class="pro-container">
                <?php while ($product = $productsResult->fetch_assoc()): ?>
                    <div class="pro"
                         data-category="<?php echo htmlspecialchars($product['productCategory']); ?>" 
                         data-ageGroup="<?php echo htmlspecialchars($product['ageGroup']); ?>"
                         data-brand="<?php echo htmlspecialchars($product['brandName']); ?>">
                        <img src="<?php echo htmlspecialchars('images/' . $product['imageUrl']); ?>" alt="<?php echo htmlspecialchars($product['productName']); ?>">
                        <div class="des">
                            <span><?php echo htmlspecialchars($product['brandName']); ?></span>
                            <h5><?php echo htmlspecialchars($product['productName']); ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>$<?php echo htmlspecialchars($product['price']); ?></h4>
                        </div>
                        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </div>

    <?php include_once 'footer.php';?>

    <script>
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const body = header.nextElementSibling;
                body.style.display = body.style.display === 'block' ? 'none' : 'block';
                header.classList.toggle('active');
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const filterLinks = document.querySelectorAll('.filter-link');
            const products = document.querySelectorAll('.pro');

            filterLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const filter = link.getAttribute('data-filter');
                    const [filterType, filterValue] = filter.split('-');

                    console.log(`Filter Type: ${filterType}`);
                    console.log(`Filter Value: ${filterValue}`);

                    products.forEach(product => {
                        const productValue = product.getAttribute(`data-${filterType}`);
                        console.log(`Product ${filterType}: ${productValue}`);

                        if (filterValue === 'all' || productValue === filterValue) {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                });
            });

            // Optional: Show all products initially if needed
            products.forEach(product => product.style.display = 'block');
        });
    </script>
</body>
</html>

