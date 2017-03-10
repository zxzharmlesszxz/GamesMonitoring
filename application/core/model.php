<?php

/**
* Model Class
* Type: abstract
**/

//namespace Core;

abstract class Model {
 protected $items;

 public function __construct() {
  $this->items = new Collection;
 }

  public function get_data() {
   return static::items;
  }

 /**
 * Method get_data
 * Type: abstract public
 * Return: mixed
 **/
 abstract public function get_data();
}
