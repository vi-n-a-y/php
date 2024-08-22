<?php
// class Car{
//     public $color;
//     public $model;

//     public function __construct($color,$model){
//         $this->color=$color;
//         $this->model=$model;
//     }

//     public function drive(){
//         return "Drivinga a $this->color $this->model";
//     }
    
// }

// $myCar=new Car("red","toyota");
// echo $myCar->drive();



//  class Car{
//     public $color;
//     public $year;


//     public function __construct($color,$year){
//         $this->color=$color;
//         $this->year=$year;
//     }
//     public function user(){
//         return "I'm driving a car that color $this->color $this->year";
        
//     }
// }


// $myCar=new Car("red",2024);
// echo $myCar->user();



// class Animal{
//     public $name;

//     public function speak(){
//         return "$this->name is making a sound";
//     }
// }

// $dog=new Animal();
// $dog->name="dog";
// echo $dog->speak();


     /* Encapsulation */
// class Person{
//     private $name;


//     public function setName($name){
//         $this->name=$name;
//     }

//     public function getName(){
//         return $this->name;
//     }
// }

// $per=new Person();
// $per->setName("vinay");
// echo $per->getName();




// class Vechile{
//     public $color;
//     public function chooseVechile(){
//         echo "my vechile color is $this->color.";
//     }
// }

// class Car extends Vechile{
//     public $type;
//     public function chooseCar()
//     {
//         echo "my car color is $this->color and company is $this->type";
//     }
// }

// $vechiles = new Car();
// $vechiles->color="red";
// $vechiles->type="toyoto";
// $vechiles->chooseCar();




   /*  polymorphism */
// class Bird{
//     public function fly(){
//         return "birds can fly";
//     }

// }
// class Animal extends Bird{
//     public function fly(){
//         return "animals can't fly";
//     }

// }


// $forest=new Bird();
// echo $forest->fly();




/* abstraction */

// abstract class Shape{
//     abstract public function draw();
// }

// class Circle extends Shape{

//     public $radius;

//     public function draw(){
//         return $this->radius*$this->radius*3.14;
//         }


// }

// $drawing=new Circle();
// $drawing->radius=5;
// echo $drawing->draw();



/* interface */

// interface Logger{
//     public function log($message);
// }
 
// class FileLogger implements Logger{
//     public function log($message){
//         echo "there is some error and the log is $message.";
//     }
// }

// $file=new FileLogger();
// $file->log("zero divide error");



//$grades=["vinay"=>92,"prem"=>96,"other"=>80];
// echo $grades["prem"];
//print_r(asort($grades));
//print_r($grades);


//$list=[2,4,6,7,8,4];
//print_r($list);

//print_r(array_reverse($list));




//$a=10;
//do{
//    echo "something\n";
//    $a++;
//}while($a<20);


//foreach($list as $iter){
//    echo $iter."\n";
//}



/* Traits :- reusable pieces of code that can be included in multiple classes, providing a way to achieve multiple inheritances */

trait Logger{
    public function log($message){
        echo "Logging message : $message";
    }
}

class User{
    use Logger;

    public function createUser(){
        $this->log("user created.");
    }
}

$users=new User();
$users->createUser();






















?>
