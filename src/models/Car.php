<?php

class Car {
  public $id;
  public $name;
  public $model;
  public $year;
  public $color;

  public function __construct($id,$name,$model,$year,$color) {
    $this->id = $id;
    $this->name = $name;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }

}