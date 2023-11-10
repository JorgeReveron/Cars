<?php

namespace Jorge\Cars\Controllers;

use Jorge\Cars\Models\Car;

class CarController {


  public function __construct() {
    // $json = file_get_contents("../data/cars.json");
    // $carsJSON = json_decode($json);
    // foreach ($carsJSON as $carJSON) {
    //   $this->cars[] = new Car($carJSON->id,$carJSON->make,$carJSON->model,$carJSON->year,$carJSON->color);
    // }
  }
  public function list() {
    //Return all cars
    $listCars = Car::getAll();
    require "../src/views/list.php";
  }

  public function show($id) {
    //Return the car with this id
    $car = Car::find($id);
    if ($car) {
      require "../src/views/show.php";
    }else{
      echo "Car not found!";
    }
  }

  public function delete($id) {
    Car::delete($id);
    $this->list();
  }

  public function create() {
    require "../src/views/create.php";
  }

  public function post($data) {
    $car = new Car($data["id"], $data["make"], $data["model"], $data["year"], $data["color"]);
    // $car = new Car("12324QWER", "Fiat", "Picanto", 2010, "red");
    Car::create($car);
    $this->list();
  }

  public function edit($id) {
    $car = Car::find($id);
    require "../src/views/edit.php";
  }

  public function update($id,$data) {
    Car::update($id,$data);
    $this->list();
  }
}