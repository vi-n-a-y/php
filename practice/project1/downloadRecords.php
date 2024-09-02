<?php
// Database connection
require 'db_connect.php'; // Replace with your actual database connection file

// Set the content type and filename for the CSV download

if(isset($_GET['downloadRec'])){
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="records.csv"');

// Open output stream for writing
$output = fopen('php://output', 'w');

// Write the header row of the CSV
fputcsv($output, ['Id','updateAt', 'firstName', 'lastName','email','contact','password']); // Replace with your actual column names

// Fetch records from the database
$query = "SELECT Id,updateAt, firstName, lastName,email,contact,password FROM signup"; // Replace with your actual query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output each row of the data
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

// Close the output stream
fclose($output);

// Close the database connection
$conn->close();
exit();
}
?>
