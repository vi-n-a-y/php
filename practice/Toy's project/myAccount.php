<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
<style>
    /* styles.css */

/* Apply a fun background to the entire page */
body {
    background: url('images/teddy_bear_2.avif') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Style the form container */
.form-container {
    background: rgba(255, 255, 255, 0.5); 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    max-width: 400px;
    width: 100%;
}


.kids-form h1 {
    color: #ff5722; /* Bright, playful color for the header */
    text-align: center;
    font-size: 2rem;
}

.kids-form label {
    display: block;
    margin: 10px 0 5px;
    font-size: 1.1rem;
}

.kids-form input {
    width: 94%;
    padding: 10px;
    
    margin-bottom: 15px;
    border: 2px solid #ff5722;
    border-radius: 5px;
    font-size: 1rem;
}

.kids-form input::placeholder {
    color: #ff5722; /* Match the placeholder color with the theme */
}

.kids-form button {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #ff5722; /* Fun and bright button color */
    color: white;
    font-size: 1.2rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.kids-form button:hover {
    background-color: #e64a19; /* Slightly darker shade for the hover effect */
}

.input-text-first-last{
    display: flex;
    gap:10px;
}

</style>


</head>
<body>
    <div class="form-container">
        <form class="kids-form">
            <h1>Sign Up</h1>
           <div class="input-text-first-last">
           <input type="text" id="name" placeholder="Name">
           <input type="text" id="lastName" placeholder="Last Name">
           </div>
            <input type="number" id="age" placeholder="Age"> 
            <input type="email" id="email" placeholder="Mail">

            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>





<!-- CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    age_group VARCHAR(50),
    category_id INT,
    brand_id INT,
    stock_quantity INT DEFAULT 0,
    image_url VARCHAR(255),
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active', 'discontinued') DEFAULT 'active',
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (brand_id) REFERENCES brands(id)
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    customer_name VARCHAR(255),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    review_text TEXT,
    review_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('Pending', 'Shipped', 'Delivered') DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP
); -->

