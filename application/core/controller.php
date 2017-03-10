<?php

/**
* Controller Class
* Type: abstract
**/

//namespace Core;

abstract class Controller {
 
 public $model;
 public $view;
 
 public function __construct() {
  $this->view = new View();
  $model = "Model_".explode("_", static::class)[1];
  $this->model = (class_exists($model)) ? new $model() : '';
  $this->query = $_REQUEST;
 }

 abstract public function action_index();
}
