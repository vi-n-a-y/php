<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate Inputs</title>

</head>

<body>
    <form action="validateInputs.php" method="post">

        UserName : <input type="text" name="userName" id="userName">
        <br>
        age : <input type="text" name="age" id="age">
        <br>
        email : <input type="text" name="email" id="email">
        <br>

        <!-- <input type="submit" value="submit" name="login> -->
        <input type="submit" value="submit" name="submit">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $name=$_POST['userName'];

           if(filter_var($name)){
            echo "valid UserName <br>";
           }else{
            echo "not a valid UserName <br>";
           }

            $age=$_POST['age'];
            if(filter_var($age,FILTER_VALIDATE_INT)){
                echo "valid Age <br>";
            }else{
                echo "Please enter a valid age <br>";
            }

        $mail=$_POST['email'];
        if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
            echo "valid email address! <br>";
        }else{
            echo "Invalid email address! <br>";
        }


        //     $name=$_POST['userName'];

        //     if(filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS)){
        //      echo "valid UserName <br>";
        //     }else{
        //      echo "not a valid UserName <br>";
        //     }

        //      $age=$_POST['age'];
        //      if(filter_var($age,FILTER_SANITIZE_NUMBER_INT)){
        //          echo "valid Age <br>";
        //      }else{
        //          echo "Please enter a valid age <br>";
        //      }

        //  $mail=$_POST['email'];
        //  if(filter_var($mail,FILTER_SANITIZE_EMAIL)){
        //      echo "valid email address! <br>";
        //  }else{
        //      echo "Invalid email address! <br>";
        //  }





        $name = $_POST['userName'];

        if (preg_match("/^[a-zA-Z0-9_]*$/", $name)) {
            echo "valid UserName <br>";
        } else {
            echo "not a valid UserName <br>";
        }

        $age = $_POST['age'];
        if (preg_match("/^[0-9]*$/", $age)) {
            echo "valid Age <br>";
        } else {
            echo "Please enter a valid age <br>";
        }

        $mail = $_POST['email'];
        if (preg_match("/^[a-zA-Z0-9_@.]*$/", $mail)) {
            echo "valid email address! <br>";
        } else {
            echo "Invalid email address! <br>";
        }
    }
    ?>
</body>

</html>
