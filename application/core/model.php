<?php

/**
* Model Class
* Type: abstract
**/

//namespace Core;

abstract class Model {
 public function __construct() {
  self::items = self::get_data();
 }

 /**
 * Method get_data
 * Type: abstract public
 * Return: mixed
 **/
 abstract public function get_data();
}
