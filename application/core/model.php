<?php

/**
* Model Class
* Type: abstract
**/

//namespace Core;

abstract class Model {
 public function __construct() {
  static::items = new Collection;
 }

 /**
 * Method get_data
 * Type: abstract public
 * Return: mixed
 **/
 abstract public function get_data();
}
