<?php

class CarController {
  private $cars = [];

  public function __construct() {
    // $this->cars[] = new Car("2453","Ford","Kuga",2021,"blue");
    // $this->cars[] = new Car("4687","Ford","Puma",2020,"red");
    // $this->cars[] = new Car("1231","Seat","Ibiza",2012,"blue");
    $json = file_get_contents("../data/cars.json");
    $carsJSON = json_decode($json);
    foreach ($carsJSON as $carJSON) {
      $this->cars[] = new Car($carJSON->id,$carJSON->make,$carJSON->model,$carJSON->year,$carJSON->color);
    }
  }
  public function list() {
    //Return all cars
    $listCars = $this->cars;
    require "../src/views/list.php";
  }

  public function show($id) {
    //Return the car with this id
    $carsFilter = array_filter($this->cars, fn($car) => $car->id == $id);
    if (sizeof($carsFilter) > 0 ) {
      $car = array_pop($carsFilter);
      require "../src/views/show.php";
    }else{
      echo "Car not found!";
    }
  }
}