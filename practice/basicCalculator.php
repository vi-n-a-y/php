<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
</head>
<body>

<form action="basicCalculator.php" method="post">
    <label for="input1">Number 1</label>
<input type="number" name="input1" id="input1">
<br>
<label for="input2">Number 2</label>
<input type="number" name="input2" id="input2">
<br>
<input type="submit" value="Submit">
</form>

    <?php 
    $inp1=isset($_POST["input1"])? (float)$_POST["input1"]:0.0;
    $inp2=isset($_POST["input2"])? (float)$_POST["input2"]:0.0;
    echo "Answer is ",$inp1+$inp2;
    
    ?>
</body>
</html>