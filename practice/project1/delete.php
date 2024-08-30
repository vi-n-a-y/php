


<?php 
session_start();



if (!isset($_SESSION['adminMail'])) {
    header("Location: admin.php");
    exit();
}  




if(isset($_GET['deleteId'])){
    $deleteId=$_GET['deleteId'];
    include_once 'db_connect.php';

  

$sql="delete from `signup` where id=$deleteId";
$result=mysqli_query($conn,$sql);
if($result){
    
    header('location:adminHome.php');
}else{
    die(mysqli_error($conn));
}
}

?>