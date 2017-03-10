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

 /**
 * Method get_data
 * Type: abstract public
 * Return: mixed
 **/
 public function get_data() {
  return static::items;
 }
}
