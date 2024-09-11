<?php

$servername="localhost";
$username="root";
// $password="";
$password="root";
$dbname="ecommerce";


$conn=new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


<!-- cd "/Applications/XAMPP/xamppfiles/htdocs/dashboard/practice/Toy's project/"
chmod 755 images
chmod 777 images


header error
// ob_start();
// Your code here
// ob_end_flush();

-->





