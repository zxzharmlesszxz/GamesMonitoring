<?php

class Model_Modes extends Model {
 public function getAjax() {
  $array = array();
  foreach ($this->items->getItems() as $key => $item) {
   $array[$key] = get_object_vars($item);
  }
  return $array;
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
