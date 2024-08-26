<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>

<h1>Cookies</h1>
<?php 


setcookie("food","biryani",time()+86400*2,"/");
setcookie("juice","sugarcane",time()+86400*3,"/");


// echo "<h3>Remove cookies </h3>";
// setcookie("food","biryani",time()-0,"/");
// setcookie("juice","sugarcane",time()-0,"/");


foreach($_COOKIE as $key=>$value){
    echo "key is $key and value is $value <br>";
}

if(isset($_COOKIE['food'])){
    echo "buy some {$_COOKIE["food"]}";
}else{
    echo "I don't know your faviorate food";
}
?>
</body>
</html>