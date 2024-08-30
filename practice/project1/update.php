
<?php
    include_once 'db_connect.php';
    
    session_start();
    if (!isset($_SESSION['adminMail'])) {
        header("Location: admin.php");
        exit();
    } 


    
   if(isset($_GET['updateId'])){
    $updateId=$_GET['updateId'];
    $sql="select * from `signup` where id=$updateId";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
if($row){
    $dbFirstName=$row['firstName'];
    $dbLastName=$row['lastName'];
    $dbEmail=$row['email'];
    $dbContact=$row['contact'];

}else{
    header('location:admin.php');
}


   }else{
    header('location:admin.php');
   }
    // echo $updateId;
    
     if (isset($_POST['submit'])) {
      
        // echo $updateId;
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $contact=$_POST['contact'];

        
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







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   

    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>
</head>
<body>


<div class="login-container">
<button class="cross-btn"><a class="cross-a-tag" href="adminHome.php"><i class="fa-solid fa-circle-xmark"></i></a></button>
        <h2>Update</h2>
        <form  method="post">
            <input type="text" name="firstName" id="firstName" placeholder="Enter your First Name" value="<?php echo $dbFirstName; ?>" required>
            <input type="text" name="lastName" id="lastName" placeholder="Enter your Last Name"  value="<?php echo $dbLastName; ?>"  required>
            <input type="email" name="email" id="email" placeholder="Enter your Email"  value="<?php echo $dbEmail; ?>"  required>
            <input type="number" name="contact" id="contact" placeholder="Enter your Contact"  value="<?php echo $dbContact; ?>"  required>
           
           
            


            <input type="submit" value="update" name="submit">
        </form>
    </div>


    
</body>
</html>