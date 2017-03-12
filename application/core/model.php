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
  foreach (substr(explode("_", static::class)[1], 0, -1)::find_all() as $item) {
   $id = $item->id();
   $this->items->addItem($item, $item->$id);
  }
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

 public function getAjax() {
  $array = array('data' => array());
  foreach ($this->items->getItems() as $key => $item) {
   $array['data'][$key] = $item;
  }
  return $array;
 }

 public function save(DatabaseObject $item){
  return $item->save() ? $item : false;
 }

 public function delete($id) {
  return $this->items->getItem($id)->delete();
 }

 public function create(array $item) {
  $item = substr(explode("_", static::class)[1], 0, -1)::add($item);
  return $item->save() ? $item : false;
 }
}
