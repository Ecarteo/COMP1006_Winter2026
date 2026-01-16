<?php
class Car {
    // Properties - Create variables
    public $make;
    public $model;
    public $year;

    // Methods - Function to return car information
    public function getCarInfo() {
        // $this-> refers to the properties of this object.
        return "Car Details: " . $this->year . " " . $this->make . " " . $this->model;
    }
}


?>