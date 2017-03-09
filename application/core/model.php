<?php

/**
* Model Class
* Type: abstract
**/

//namespace Core;

abstract class Model {
 protected $items;

 public function __construct() {
  self::$items = new Collection;
 }

 /**
 * Method get_data
 * Type: abstract public
 * Return: mixed
 **/
 abstract public function get_data();
}
