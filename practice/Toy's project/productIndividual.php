<?php
include 'db_connect.php';

// Get the product ID from the query string
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$productQuery = "SELECT 
                    p.id AS productId,
                    p.name AS productName,
                    p.description,
                    p.price,
                    p.SKU,
                    p.imageUrl,
                     -- Assuming you have a field for multiple images
                    b.name AS brandName,
                    c.name AS categoryName,
                    a.ageGroup AS ageGroup,
                    p.stockQuantity,
                    p.discount,
                    p.status
                  FROM 
                    products p
                    INNER JOIN brands b ON p.brandId = b.id
                    INNER JOIN categories c ON p.categoryId = c.id
                    INNER JOIN ageGroup a ON p.ageGroupId = a.id
                  WHERE p.id = ?";
                  
$stmt = $conn->prepare($productQuery);
$stmt->bind_param('i', $productId);
$stmt->execute();
$productResult = $stmt->get_result();
$product = $productResult->fetch_assoc();

if (!$product) {
    die('Product not found');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['productName']); ?> - Product Detail</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .main-content {
        display: flex;
        flex-direction: column;
        margin: 20px;
    }

    /* Product Detail Page Styling */
    .product-detail {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 1200px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .product-images {
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width: 1200px;
        margin-bottom: 20px;
    }

    .product-images .main-image {
        flex: 1;
        max-width: 600px;
        margin-right: 20px;
    }

    .product-images .main-image img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .product-details {
        flex: 1;
        max-width: 600px;
    }

    .product-details h1 {
        margin: 20px 0;
        font-size: 2rem;
        color: #333;
    }

    .product-details p {
        margin: 10px 0;
        font-size: 1rem;
        color: #555;
    }

    .product-details .price {
        font-size: 1.5rem;
        color: #333;
        margin: 20px 0;
    }

    .buttons {
        margin-top: 20px;
    }

    .buttons .cart-btn,
    .buttons .buy-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        margin-right: 10px;
        text-decoration: none;
    }

    .buttons .cart-btn {
        background-color: #007bff;
    }

    .buttons .buy-btn {
        background-color: #28a745;
    }

    .buttons .cart-btn:hover,
    .buttons .buy-btn:hover {
        opacity: 0.8;
    }

    .additional-images {
        margin-top: 20px;
        text-align: center;
    }

    .additional-images img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin: 0 5px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<body>
    <?php include 'header.php'; ?>

    <div class="main-content">
        <div class="product-detail">
            <div class="product-images">
                <div class="main-image">
                    <img src="<?php echo htmlspecialchars('images/' . $product['imageUrl']); ?>" alt="<?php echo htmlspecialchars($product['productName']); ?>">
                </div>
                <div class="product-details">
                    <h1><?php echo htmlspecialchars($product['productName']); ?></h1>
                    <p><strong>Brand:</strong> <?php echo htmlspecialchars($product['brandName']); ?></p>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($product['categoryName']); ?></p>
                    <p><strong>Age Group:</strong> <?php echo htmlspecialchars($product['ageGroup']); ?></p>
                    <p class="price"><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
                    
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
                   
                    <p><strong>Discount:</strong> <?php echo htmlspecialchars($product['discount']); ?>%</p>
                   
                    <div class="buttons">
                        <a href="cart.php?product_id=<?php echo htmlspecialchars($product['productId']); ?>" class="cart-btn">Add to Cart</a>
                        <a href="checkout.php?product_id=<?php echo htmlspecialchars($product['productId']); ?>" class="buy-btn">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="additional-images">
                <!-- <?php 
                // Assuming `imageUrls` is a comma-separated list of additional images
                // $additionalImages = explode(',', $product['imageUrls']); 
                // foreach ($additionalImages as $image): 
                ?>
                    <img src="<?php /*  echo htmlspecialchars('images/' . trim($image)) */; ?>" alt="Additional Image">
                <?php /* endforeach; */ ?> -->
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
