<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

   <style>
           .container1 {
            margin-top: 18%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* / margin: 0 auto; / */


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

        <form action="login.php" method="post">
            <h2>Login</h2>
            <table>
                
                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td> <input type="email" name="email" id="email" placeholder="Enter your Email">

                        </td>
                    </tr>
                
                <tr>
                    <td>
                        <label for="password">password</label>
                    </td>
                    <td><input type="password" name="password" id="password" placeholder="Enter your password">

                    </td>
                </tr>
            </table>
            <div class="button-gap">
                <button name="submit">Submit</button>
            </div>


        </form>
    </div>

    <?php

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password1=$_POST['password'];
    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // echo "Valid email";
        } else {
            echo "Invalid Email address<br>";
        }
    } else {
        echo "Please enter your email<br>";
    }

 if(!empty($password1)){
    
    if(preg_match("/^[a-zA-Z0-9$@_]*$/",$password1)){
        // echo "correct format";
    }else{
        echo "invalid password<br>";
    }
 }else{
    echo "please enter your password<br>";
 }


 include_once 'db_connect.php';


 $stmt=$conn->prepare("SELECT firstName,lastName,password FROM signup WHERE email=?");
 $stmt->bind_param("s",$email);
 $stmt->execute();
 $stmt->store_result();

 if($stmt->num_rows>0){
    $stmt->bind_result($firstName,$lastName,$hashedPassword);
    $stmt->fetch();


 if(password_verify($password1,$hashedPassword)){
    echo "successfull ";

$firstNameEncoded=urlencode($firstName);
$lastNameEncoded=urlencode($lastName);



    header("Location: home.php?firstName={$firstNameEncoded}&lastName={$lastNameEncoded}");
    exit();
 }else{
    echo "Invalid password<br>";

 }

}else{
    echo "inncorrect email address<br>";
}
$stmt->close();
$conn->close();
}


?>
</body>
</html>