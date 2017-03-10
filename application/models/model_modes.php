<?php

class Model_Modes extends Model {
 
 public function __construct() {
  parent::__construct();
  foreach (Modes::find_all() as $item) {
   $this->items->addItem($item, $item->modeid);
  }
 }

 public function get_data() {
  return $this->items;
 }

 public function get($itemid) {
  return $this->items->getItem($itemid);
 }

 public function getAjax() {
  return get_object_vars($this->items->getItems());
 }

 public function save(Mode $mode){
  return $mode->save() ? $mode : false;
 }

 public function create(array $item) {
  $new = Modes::add($item);
  return $new->save() ? $new : false;
 }

 public function delete($itemid) {
  return $this->items->getItem($itemid)->delete();
 }

 public function update(array $item) {
  foreach ($item as $key => $value) {
   $item[$key] = trim($value);
  }
  $u = $this->items->getItem($item['modeid']);
  unset($item['modeid']);
  if (!$u) {
   return FALSE;
  }
  foreach ($item as $key => $value) {
   $u->$key = $value;
  }
  return $u->save() ? $u : false;
 }
}
