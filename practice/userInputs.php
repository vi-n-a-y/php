<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Inputs</title>
</head>
<body>
    <form action="userInputs.php" method="post" >
        <label for="name">Name :</label>
        <input type="text" name="name" id="name" placeholder="Enter Your name">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="age">age</label>
        <input type="number" name="age" id="age">
        <input type="submit" value="submit">
    </form>
    <br>
    <?php

    echo "MY name is ",$_POST["name"];
    echo "<br> my age is ",$_POST["age"];




?>
</body>
</html>