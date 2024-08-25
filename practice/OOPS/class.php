<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
</head>
<body>


<?php   

    class Book{
    public $title;
     public $author;
     var $pages;   

     public function __construct($title,$author,$pages){
        $this->title=$title;
        $this->author=$author;
        $this->pages=$pages;
        echo "constructor is called";
        echo $this->title;
        echo $author;
        echo $pages;

     }
     
    }


    $obj=new Book("Harry Potter","JK Rowling",56);
//  $obj->author="raju";
    $obj->title="Vinay";
    // $obj->pages=58;

    // echo $obj->title;

    echo $obj->title;


?>
    
</body>
</html>