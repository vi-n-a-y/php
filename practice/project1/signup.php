<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <style>
        .container1 {
            /* margin-top: 15%; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height:100vh;
            /* / border:1px solid black; /
            / margin: 0 auto; / */


        }

        form {
            border: 1px solid black;
            padding: 20px 40px;
            background-color: white;


        }


        body {
            font-family: Arial, Helvetica, sans-serif;

            background: linear-gradient(to bottom, #959a85, #959a85);
        }

        .button-gap {
            margin-top: 20px;
        }

        button {
            padding: 5px 30px;
            color: white;
            font-weight: bold;
            background-color: orange;
            border: none;
        }

        label {
            color: blue;
        }

        h2 {
            text-align: center;
            color: orange;
        }
        input{
            padding:5px 35px;
           
        }

       

        table {
            border-collapse: separate;
            border-spacing: 0 10px; /* / Vertical spacing between rows / */
        }

        td {
            padding: 5px; /* / Padding inside each cell / */
        }
    </style>
</head>

<body>
    <div class="container1">

        <form action="signup.php" method="post">
            <h2>Sign Up</h2>
            <table>

                <tr>
                    <td>
                        <label for="firstName">First Name</label>
                    </td>
                    <td> <input type="text" name="firstName" id="firstName" placeholder="Enter your First Name">

                    </td>
                </tr>



                <tr>
                    <td>
                        <label for="lastName">Last Name</label>
                    </td>
                    <td> <input type="text" name="lastName" id="lastName" placeholder="Enter your Last Name">

                    </td>
                </tr>

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
                    <td><input type="password" name="password" id="Password" placeholder="Enter your Password">

                    </td>
                </tr>


                <tr>

                    <td>
                        <label for="conPassword">Confirm Password</label>
                    </td>
                    <td><input type="password" name="conPassword" id="conPassword" placeholder="Confirm password">

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
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password1=$_POST['password'];



        $servername="localhost";
        $username="root";
        $password="root";
        $dbname="project1_db";
    
    
        $conn=new mysqli($servername,$username,$password,$dbname);
    
        if($conn->connect_error){
            die("connection failed : ".$conn->connect_error);
        }
    
        $stmt=$conn->prepare("INSERT INTO signup (firstName,lastName,email,password) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$firstName,$lastName,$email,$password1);
    
    
        if($stmt->execute()){
            echo "Inserted successfully";
        }else{
            echo "error while inserting the records: ".$stmt->error;
        }
    
        $stmt->close();
        $conn->close();

    }

   

    // create table signup(
    //     id int AUTO_INCREMENT PRIMARY KEY,
    //     firstName varchar(50),
    //     lastName varchar(50),
    //     email varchar(70) UNIQUE,
    //     password varchar(70));

    // INSERT INTO `signup` (`firstName`, `lastName`, `email`, `password`) VALUES ('bala', 'malla', 'bala@eg.com', 'bala1234');


  
    
    
    
    ?>
</body>

</html>