<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

if(isset($_GET['logout'])){
    header('location:admin.php');
}else{
    header('location:login.php');
}
?>
