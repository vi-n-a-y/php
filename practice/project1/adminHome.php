<?php 
session_start();
if (!isset($_SESSION['adminMail'])) {
    header("Location: admin.php");
    exit();
} else {
    $stringPos = strpos($_SESSION['adminMail'], '@');
    $adminName = substr($_SESSION['adminMail'], 0, $stringPos);
    $adminName1 = ucfirst($adminName);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .action-btn {
            padding: 5px 10px;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            border-radius: 3px;
        }
        .update-btn {
            background-color: #4CAF50;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .action-btn:hover {
            opacity: 0.8;
        }

        a{
            text-decoration: none;
            color:white;
        }
</style>

<body>

<h1>Welcome, <?php echo $adminName1;  ?></h1>




    <?php


        include_once 'db_connect.php';



        $sql = "SELECT * FROM signup";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
<table>
        <thead>
            <tr>
               <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
           $i=0;
            while ($row = $result->fetch_assoc()) {
           
              $i++;
                echo "<tr><td>{$i}</td><td>{$row["firstName"]}</td><td>{$row["lastName"]}</td><td>{$row["email"]}</td><td>
                    <button class='action-btn update-btn'><a href='update.php?updateId={$row["id"]}'> Update </a></button>
                    <button class='action-btn delete-btn'><a href='delete.php?deleteId={$row["id"]}'> Delete</a></button>
                </td></tr> ";
          
                
            }

            //color hunt
            
            

            ?>
   </tbody>
   </table>
            <?php
           
        } else {
            echo "data not found";
        }

        $conn->close();
    }
    ?>



</body>

</html>