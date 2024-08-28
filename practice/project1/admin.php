<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        .container1 {
          height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
          


        }



        form{
            border:1px solid black;
            padding:20px 40px;
            background-color: white;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to bottom, #959a85, #959a85);
        }

        .button-gap {
            margin-top: 20px;
        }
        button{
            padding:5px 30px;
            color:white;
            font-weight: bold;
            background-color:orange;
            border: none;
        }
        label{
            color:blue;
        }
        h2{
            text-align: center;
            color:orange;
        }

        input{
            padding:5px 20px;
        }

       

        table {
            border-collapse: separate;
            border-spacing: 0 10px; 
        }

        td {
            padding: 5px; 
        }
    
    </style>
</head>

<body>
    <div class="container1">

        <form action="admin.php" method="post">
            <h2>Admin Login</h2>
            <table>
                
                    <tr>
                        <td>
                            <label for="adminMail">Admin Mali</label>
                        </td>
                        <td> <input type="email" name="adminMail" id="adminMail" placeholder="Enter your Email">

                        </td>
                    </tr>
                
                <tr>
                    <td>
                        <label for="adminPassword">password</label>
                    </td>
                    <td><input type="password" name="adminPassword" id="adminPassword" placeholder="Enter your password">

                    </td>
                </tr>
            </table>
            <div class="button-gap">
                <button name="submit" >Submit</button>
            </div>

        </form>
    </div>


    <?php  
    
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $adminMail=$_POST['adminMail'];
        $adminPassword=$_POST['adminPassword'];


        include_once 'db_connect.php';
        $stmt=$conn->prepare("SELECT adminMail,adminPassword FROM admin WHERE adminMail=?");
        $stmt->bind_param("s",$adminMail);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows >0){
            $stmt->bind_result($databaseMail,$databasePassword);
            $stmt->fetch();

            if($databasePassword===$adminPassword){
                $_SESSION['adminMail']=$databaseMail;
                header("Location: adminHome.php");
                exit();
            }else{
                
                echo "Invalid Password";
            }

        }else{
            echo "Invalid email or password";
        }

        $stmt->close();
        $conn->close();
    }
    
    ?>
</body>

</html>