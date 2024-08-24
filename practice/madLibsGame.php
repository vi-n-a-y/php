<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mad Libs Game</title>
</head>
<body>

<form action="madLibsGame.php" method="get" >
<label for="color">Color</label>
<input type="text" name="color" id="color">
<br>
<label for="pluralNoun">Plural Noun :</label>
<input type="text" name="pluralNoun" id="pluralNoun">

<br>
<label for="celebrity">Celebrity :</label>
<input type="text" name="celebrity" id="celebrity">
<input type="submit" value="submit">
</form>




    <?php 


$color=isset($_GET["color"])?$_GET["color"]:'';
$pluralNoun=isset($_GET["pluralNoun"])?$_GET["pluralNoun"]:'';
$celebrity=isset($_GET["celebrity"])?$_GET["celebrity"]:'';

// $color=$_GET["color"];
// $pluralNoun=$_GET["pluralNoun"];
// $celebrity=$_GET["celebrity"];



   if($color!=''){
    echo "Roses are $color <br>";
    echo "$pluralNoun are blue <br>";
    echo "I love $celebrity <br>";
   }
    
    ?>
</body>
</html>