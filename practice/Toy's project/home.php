<?php
include 'db_connect.php';
session_start();

$categoriesQuery = "SELECT DISTINCT name FROM categories";
$categoriesResult = $conn->query($categoriesQuery);

$brandsQuery = "SELECT DISTINCT name FROM brands";
$brandsResult = $conn->query($brandsQuery);

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
    <title>Kids Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<style>
    /* Your existing styles here */
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
        width: 20%;
        background-color: #f9f9f9;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-right: 20px;
    }

    .accordion-item {
        margin-bottom: 10px;
        border-radius: 5px;
        overflow: hidden;
        background-color: #fff;
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

    /* Product Section */
    .section-p1 {
        flex: 1;
        padding: 20px;
        background-color: #f5f5f5;
    }

    .pro-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around;
    }

    .pro {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        width: calc(25% - 20px);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .pro img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .des {
        margin-bottom: 10px;
    }

    .cart {
        color: red;
        font-size: 24px;
        cursor: pointer;
    }

    .pro-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
    }

    .pro {
        flex: 1 1 50px;
        margin-bottom: 20px;
    }
    .pro a{
        text-decoration: none;
        
    }

    .added {
    background-color: #28a745; /* Green background color */
    transition: background-color 0.3s ease; /* Smooth transition */
}

/* Your existing styles */
.cart {
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* When the product is added to the cart */
.cart.added {
    background-color: #28a745; /* Green background color */
    color: white; /* White text color */
}

</style>

<body>
    <?php include 'header.php'; ?>

    <div class="main-content">
        <!-- Filters -->
        <div class="filters">
            <div class="accordion">
                <!-- Category Filter -->
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

                <!-- Age Filter -->
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

                <!-- Brand Filter -->
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

        <!-- Product Listing -->
        <section id="product1" class="section-p1">
            <h2>Kids Products</h2>
            <div class="pro-container">
                <?php while ($product = $productsResult->fetch_assoc()): ?>
                    <div class="pro"
                         data-category="<?php echo htmlspecialchars($product['productCategory']); ?>" 
                         data-ageGroup="<?php echo htmlspecialchars($product['ageGroup']); ?>"
                         data-brand="<?php echo htmlspecialchars($product['brandName']); ?>">
                         <a href="productIndividual.php?id=<?php echo htmlspecialchars($product['productId']); ?>" >
                       
                        <img src="<?php echo htmlspecialchars('images/' . $product['imageUrl']); ?>" alt="<?php echo htmlspecialchars($product['productName']); ?>">
                        <div class="des">
                            <span><?php echo htmlspecialchars($product['brandName']); ?></span>
                            <h5><?php echo htmlspecialchars($product['productName']); ?></h5>
                            <h4>$<?php echo htmlspecialchars($product['price']); ?></h4>
                        </div>
                        <a href="cart.php?product_id=<?php echo htmlspecialchars($product['productId']); ?>" class="add-to-cart" data-product-id="<?php echo htmlspecialchars($product['productId']); ?>">
                            <i class="fas fa-shopping-cart cart"></i>
                        </a>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </div>

    <?php include_once 'footer.php';?>

    <!-- JavaScript for Add to Cart and Filters -->
    <script>
        // Accordion Functionality
        document.addEventListener('DOMContentLoaded', () => {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const accordionBody = header.nextElementSibling;
                    const isActive = header.classList.contains('active');

                    // Toggle active state
                    header.classList.toggle('active', !isActive);

                    // Toggle accordion body visibility
                    accordionBody.style.display = isActive ? 'none' : 'block';
                });
            });
        });

        // Add to Cart
// Add to Cart


        // Product Filters
        document.addEventListener('DOMContentLoaded', () => {
            const filterLinks = document.querySelectorAll('.filter-link');
            const products = document.querySelectorAll('.pro');

            filterLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const filter = link.getAttribute('data-filter');
                    const [filterType, filterValue] = filter.split('-');

                    products.forEach(product => {
                        const productValue = product.getAttribute(`data-${filterType}`);

                        if (filterValue === 'all' || productValue === filterValue) {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                });
            });

            // Optional: Show all products initially
            products.forEach(product => product.style.display = 'block');
        });



document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        let clickTimeout;

        button.addEventListener('click', (e) => {
            e.preventDefault();
            const productId = button.getAttribute('data-product-id');
            const cartIcon = button.querySelector('.cart');
            alert('Item add Successfully!');

            if (cartIcon.classList.contains('added')) {
                // If the button is already in the 'added' state, remove it
                cartIcon.classList.remove('added');

                // Optionally: Send request to remove the product from the cart
                fetch(`cart.php?remove_product_id=${encodeURIComponent(productId)}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                })
                .then(response => response.text())
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong!');
                });
            } else {
                // If the button is not in the 'added' state, add it
                cartIcon.classList.add('added');

                // Send request to add the product to the cart
                fetch(`cart.php?product_id=${encodeURIComponent(productId)}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                })
                .then(response => response.text())
                .then(data => {
                    if (!data.includes('Product added to cart!')) {
                        // If the product wasn't added, remove the 'added' class
                        cartIcon.classList.remove('added');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong!');
                });

                // Set a timeout to detect double-click
                clickTimeout = setTimeout(() => {
                    clickTimeout = null;
                }, 300); // Adjust the timeout duration as needed
            }
        });

        button.addEventListener('dblclick', (e) => {
            e.preventDefault();
            clearTimeout(clickTimeout);
            clickTimeout = null;

            const cartIcon = button.querySelector('.cart');
            cartIcon.classList.remove('added');

            // Optionally: Send request to remove the product from the cart
            fetch(`cart.php?remove_product_id=${encodeURIComponent(button.getAttribute('data-product-id'))}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
            })
            .then(response => response.text())
            .catch(error => {
                console.error('Error:', error);
                alert('Error in the code!');
            });
        });
    });
});


    </script>
</body>

</html>
