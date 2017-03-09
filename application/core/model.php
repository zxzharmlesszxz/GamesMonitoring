<?php

/**
* Model Class
* Type: abstract
**/

//namespace Core;

abstract class Model {
 protected $items = new Collection;

 public function __construct() {

 }

 /**
 * Method get_data
 * Type: abstract public
 * Return: mixed
 **/
 abstract public function get_data();
}
