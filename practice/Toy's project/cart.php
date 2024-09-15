<?php
include 'db_connect.php';
session_start();

// Initialize cart session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding a product to the cart via GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += 1; // Increase quantity if already in cart
    } else {
        // Fetch product details from the database
        $productQuery = "SELECT id, name, price, imageUrl FROM products WHERE id = ?";
        $stmt = $conn->prepare($productQuery);
        $stmt->bind_param("i", $productId); // Use prepared statements to prevent SQL injection
        $stmt->execute();
        $productResult = $stmt->get_result();
        
        if ($productResult->num_rows > 0) {
            $product = $productResult->fetch_assoc();
            
            // Add the product to the cart
            $_SESSION['cart'][$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'imageUrl' => $product['imageUrl'],
                'quantity' => 1
            ];
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Product added to cart!']);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Product not found.']);
            exit;
        }
    }
}

// Handle updating quantity via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $productId = $_POST['product_id'];
        $quantity = intval($_POST['quantity']);
        
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$productId]); // Remove item if quantity is 0 or less
        } elseif (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity; // Update quantity
        }
        header('Location: cart.php'); // Redirect to avoid form resubmission
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .cart-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom:20px;
            margin-top:20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 5px;
        }
        .cart-item-details {
            flex: 1;
        }
        .cart-item h4 {
            margin: 0;
            font-size: 18px;
        }
        .cart-item h5 {
            margin: 5px 0;
            color: #666;
        }
        .cart-item-price {
            font-weight: bold;
        }
        .cart-item-quantity {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .cart-item-quantity input {
            width: 50px;
            padding: 5px;
            text-align: center;
            margin-right: 10px;
        }
        .update-btn {
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .cart-total {
            text-align: right;
            margin-top: 20px;
        }
        .cart-total h3 {
            font-size: 24px;
            margin: 0;
        }
        .checkout-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }
        .checkout-btn:hover {
            background-color: #0056b3;
        }
        .empty-cart {
            text-align: center;
            margin: 50px 0;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

    <div class="cart-container">
        <h1>Your Cart</h1>

        <?php if (!empty($_SESSION['cart'])): ?>
            <?php 
                $totalPrice = 0;
                foreach ($_SESSION['cart'] as $productId => $cartItem): 
                    $totalPrice += $cartItem['price'] * $cartItem['quantity'];
            ?>
                <div class="cart-item">
                    <img src="images/<?php echo htmlspecialchars($cartItem['imageUrl']); ?>" alt="<?php echo htmlspecialchars($cartItem['name']); ?>">
                    <div class="cart-item-details">
                        <h4><?php echo htmlspecialchars($cartItem['name']); ?></h4>
                        <h5>Price: $<?php echo htmlspecialchars($cartItem['price']); ?></h5>
                        <div class="cart-item-quantity">
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="number" name="quantity" value="<?php echo htmlspecialchars($cartItem['quantity']); ?>" min="0">
                                <button type="submit" class="update-btn" name="update_quantity">Update</button>
                            </form>
                        </div>
                    </div>
                    <div class="cart-item-price">
                        $<?php echo number_format($cartItem['price'] * $cartItem['quantity'], 2); ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="cart-total">
                <h3>Total: $<?php echo number_format($totalPrice, 2); ?></h3>
                <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
            </div>

        <?php else: ?>
            <div class="empty-cart">
                <h3>Your cart is empty.</h3>
                <a href="index.php" class="checkout-btn">Continue Shopping</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include_once 'footer.php';?>

</body>
</html>
