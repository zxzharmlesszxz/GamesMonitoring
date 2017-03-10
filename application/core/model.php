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
  return $this->items;
 }

 public function get($id) {
  return $this->items->getItem($id);
 }

 public function save(DatabaseObject $item){
  return $item->save() ? $item : false;
 }

 public function delete($id) {
  return $this->items->getItem($id)->delete();
 }
}
