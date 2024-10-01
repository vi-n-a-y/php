<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using CheckBoxes</title>
</head>
<body>

<form action="usingCheckboxes.php" method="post">

    Apples:<input type="checkbox" name="fruits[]" value="apple">
    <br>
    Oranges:<input type="checkbox" name="fruits[]" value="oranges">
    <br>
    Pears:<input type="checkbox" name="fruits[]" value="pears">
    <br>


    <input type="submit" name="submit" value="submit">
</form>

<?php

if(isset($_POST["submit"])){

$arr=$_POST["fruits"];
print_r($arr);
print_r($arr[0]);

}

?>
    
</body>
</html>
