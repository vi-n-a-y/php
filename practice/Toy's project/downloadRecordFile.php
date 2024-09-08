<?php
// Database connection details
include_once 'db_connect.php';
$filename = "products_" . date('Y-m-d') . ".csv";

// Set headers to prompt download of CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Output the CSV headers
$output = fopen('php://output', 'w');
fputcsv($output, ['id', 'name', 'description', 'price', 'SKU', 'categoryId', 'brandId', 'ageGroupId', 'stockQuantity', 'imageUrl', 'discount', 'status']);

// Fetch data from the products table
$sql = "SELECT id, name, description, price, SKU, categoryId, brandId, ageGroupId, stockQuantity, imageUrl, discount, status FROM products";
$result = $conn->query($sql);

// Write data to CSV
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    // header('location:adminHome.php');
} else {
    fputcsv($output, ["No data found"]);
}

// Close the output stream and connection
fclose($output);
$conn->close();
exit();
?>
