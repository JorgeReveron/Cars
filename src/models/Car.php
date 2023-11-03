<?php

namespace Jorge\Cars\Models;

class Car {
  public $id;
  public $make;
  public $model;
  public $year;
  public $color;

  public function __construct($id,$make,$model,$year,$color) {
    $this->id = $id;
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }

  public static function getAll() {
    $cars = [];
    $json = file_get_contents("../data/cars.json");
    $carsJSON = json_decode($json);
    foreach ($carsJSON as $carJSON) {
      $cars[] = new Car($carJSON->id,$carJSON->make,$carJSON->model,$carJSON->year,$carJSON->color);
    }
    return $cars;
  }

  public static function find($id) {
    foreach (self::getAll() as $car) {
      if ($car->id == $id) return $car;
    }
    // $carsFilter = array_filter(self::getAll(), fn($car) => $car->id == $id);
    // if (sizeof($carsFilter) > 0) {
    //   return array_pop($carsFilter);
    // }
    return null;
  }

  public static function delete($id) {
    $cars = [];
    foreach (self::getAll() as $car) {
      if ($car->id != $id) {
        $cars[] = $car;
      }
    }
    $jsonString = json_encode($cars, JSON_PRETTY_PRINT);
    $file = fopen("../data/cars.json", "w");
    fwrite($file, $jsonString);
    fclose($file);
  }
}