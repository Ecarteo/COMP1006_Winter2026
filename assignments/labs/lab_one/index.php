<?php 
// Instantiate a car
require_once("car.php");

$myCar = new Car();

//Set properties
$myCar->make = "Tesla";
$myCar->model = "Model S";
$myCar->year = 2026;

echo $myCar->getCarInfo();

require "header.php"; 
echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";
require "footer.php"; 

/* Reflection:
Creating the class was pretty easy, instantiating the object was easy too. However,
testing it though, was very hard. Basically I did not know how to do it, meaning
I had to look it up online.
*/

?>