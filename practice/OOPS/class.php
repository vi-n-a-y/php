<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
</head>

<body>

    <h1>Creating Classes, Constructor and Objects</h1>

    <?php

    class Book
    {
        public $title;
        public $author;
        var $pages;

        public function __construct($title, $author, $pages)
        {
            $this->title = $title;
            $this->author = $author;
            $this->pages = $pages;
            echo "constructor is called";
            echo "<br>";
            echo $this->title;
            echo "<br>";
            echo $author;
            echo "<br>";
            echo $pages;
            echo "<br>";
        }
    }


    $obj = new Book("Harry Potter", "JK Rowling", 56);
    //  $obj->author="raju";
    $obj->title = "Vinay";
    // $obj->pages=58;

    // echo $obj->title;

    echo $obj->title;
    echo "<br>";


    ?>




    <?php
    class Person
    {
        public $name;

        public function __construct($n)
        {
            $this->name = $n;
        }
    }
    $obj = new Person("vinay");
    echo $obj->name;
    ?>


    <h2>abstraction in php</h2>


    <?php
    abstract class Vechile
    {
        abstract public function car();
    }
    class Jeep extends Vechile
    {
        public function car()
        {
            echo "It has four tyres with medium size";
        }

        public function bike()
        {
            echo "It has a two tyres";
        }
    }
    $obj1 = new Jeep();
    $obj1->car();
    echo "<br>";
    $obj1->bike();

    ?>


    <h2>Encapsulation</h2>

    <?php class User
    {
        private $name;
        private $age;

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }


        public function setAge($age)
        {
            $this->age = $age;
        }
        public function getAge()
        {
            return $this->age;
        }
    }

    $obj3 = new User();
    $obj3->setName("vinay");
    $obj3->setAge(24);
    echo $obj3->getName();
    echo "<br>";
    echo $obj3->getAge();





    ?>



    <h2>Inheritance</h2>

    <?php
    class Father
    {
        public function father1()
        {
            echo "Iam the Father of the family";
        }
    }
    class Mother extends Father
    {
        public function mother1()
        {
            echo "Iam the Mother of the family";
        }
    }


    $obj4 = new Mother();
    $obj4->father1();
    echo "<br>";
    $obj4->mother1();
    ?>



    <h2>polymorphism</h2>

    <?php
    class Poly
    {
        public function impPoly()
        {
            echo "Printing using the polymorphism means many Forms";
        }
    }

    class ExtPoly extends Poly
    {
        public function impPoly()
        {
            echo "Here is the own Implementation ";
        }
    }

    $obj5 = new ExtPoly();
    $obj5->impPoly();


    echo "<br>";
    $obj5_1 = new Poly();
    $obj5_1->impPoly();


    ?>




    <h2>Interfaces</h2>


    <?php
    interface Drawing
    {
        function draw();
    }

    class Circle implements Drawing
    {
        public function draw()
        {
            echo "Drawing a Square";
        }

        public function cir()
        {
            echo "Drawing a circle";
        }
    }

    echo "something";
    $obj6 = new Circle();
    $obj6->cir();
    ?>


    <h2>Traits</h2>

    <?php

    trait Some
    {
        public function Log($message)
        {
            echo "The message is getting from the $message";
        }
    }

    class Something
    {
        use Some;
        public function greet($name)
        {
            $this->log($name);
        }
    }

    $obj7 = new Something();
    $obj7->greet("vinay");


    ?>

    <h2>
        Static variable and Static Methods
    </h2>


    <?php
    class StaticKeyWord
    {
        public static $count = 0;

        public static function Counter()
        {
            self::$count++;
        }
    }


    StaticKeyWord::Counter();
    echo StaticKeyWord::$count;





    ?>



    <h2>Error Handling</h2>
    <?php


    try {
        $answer = 20 / 0;
        echo $answer;
    } catch (Throwable $ex) {
        echo $ex->getmessage();
    }


    ?>



    <h2>Time</h2>
    <?php

    $timeStamp = time();
    echo date('y/m/d', $timeStamp);
    // echo $timeStamp;

    ?>


    <h2>Enums</h2>

    <?php

    enum Status
    {
        case SAVINGS;
        case CURRENT;
        case BUSINESS;
    }

    class Bank
    {
        public Status $status;
    }

    $obj8 = new Bank();
    $obj8->status = Status::SAVINGS;
    if ($obj8->status == Status::CURRENT) {

        echo "The bank account is in Current status";
    } elseif ($obj8->status == Status::SAVINGS) {
        echo "the Bank account in Savings";
    } else {
        echo "The bank account is Business account";
    }

    echo "something";

    echo "something1";



    ?>


</body>

</html>
