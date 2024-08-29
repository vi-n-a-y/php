<?php
session_start();
include_once 'db_connect.php';
if (!isset($_SESSION['dbId'])) {
    header("Location: login.php");
    exit();
} 



if(isset($_SESSION['dbId'])){
    $dbId =$_SESSION['dbId'];
    // echo $dpId;
    $sql="select * from `signup` where id=$dbId ";
    // echo $sql;
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
if($row){
    $dbFirstName=$row['firstName'];
    $dbLastName=$row['lastName'];
    $dbEmail=$row['email'];
    $dbContact=$row['contact'];

    

}else{
    header('location:login.php');
}


   }else{
    header('location:login.php');
   }






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
        <h2>Update Profile</h2>
        <form  method="post">
            <input type="text" name="firstName" id="firstName" placeholder="Enter your First Name"  value="<?php echo $dbFirstName; ?>" required>
            <input type="text" name="lastName" id="lastName" placeholder="Enter your Last Name"  value="<?php echo $dbLastName; ?>" required>
            <input type="email" name="email" id="email" placeholder="Enter your Email"  value="<?php echo $dbEmail; ?>" required>
            <input type="number" name="contact" id="contact" placeholder="Enter your Contact"  value="<?php echo $dbContact; ?>" required>
            <input type="password" name="password" id="Password" placeholder="Update Password" required>
            <input type="password" name="conPassword" id="conPassword" placeholder="Confirm password" required>

            <input type="submit" value="Update Profile" name="submit">
        </form>
       
    </div>

    <?php

    if (isset($_POST['submit'])) {
      
      // echo $updateId;
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];

      
      $stmt =$conn->prepare("update `signup` set  firstName=?,lastName=?,email=?,contact=? where id=?");
    
      // $sql ="update `signup` set  firstName='$firstName',lastName='$lastName',email='$email' where id='$updateId'";
      // $result=mysqli_query($conn,$sql);

      // if($result){
      //     echo "updated successfully";
      // }else{
      //     echo "something went wrong";
      // }



      $stmt->bind_param("ssssi", $firstName, $lastName, $email,$contact, $updateId);
      // print_r( $stmt);
      if ($stmt->execute()) {
          // echo "updated successfully";
header('location:adminHome.php');
exit();
      }else{
          echo "something went wrong";
      }

   }
  
  ?>



    
</body>
</html>