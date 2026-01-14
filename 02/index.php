<?php
declare (strict_types = 1);

//1. Set Up & Start 

//2. Code Commenting 

// 

//3. Variables, Data Tyoes, Concatenation, Conditional Statements & Echo
$firstName = "Matthew";
$lastName = "Calderon";
$age = 40;
$isInstructor = true;

echo "<p> Hello there, my name is " . $firstName . " " . $lastName . "</p";

if ($isInstructor) {
    echo "<p> I am your teacher <p>";
}
else {
    echo "<p> Opps, teacher didn't show! <p>";
}
//4. Loosely Typed Language Demo
$num1 = 1;
$num2 = 10;

function add($num1, $num2) {
    return $num1 + $num2;
}

echo "<p>" . add($num1, $num2) . "</p>";

//5. Strict Types & Types Hints


//6. OOP with PHP 