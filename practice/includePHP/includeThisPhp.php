<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Including other PHP files</title>
</head>

<body>
    <?php
    $title = "my First Post";
    $author = "mike";
    $wordCount = 400;

    include "articleHeader.php"


    ?>
    <br>

    <?php

    include "includeOtherFunction.php";
    name("vinay");
    echo "<br>";
    echo $feetInMIle;


    ?>
</body>

</html>