<?php

class Model_Modes extends Model {
 public function getAjax() {
  $array = array('data' => array());
  foreach ($this->items->getItems() as $key => $item) {
   $array['data'][] = $item;
  }
  return $array;
 }

 public function update(array $item) {
  $item = array_map("trim", $item);

  $old = $this->items->getItem($item['modeid']);
  unset($item['modeid']);

  if (!$old) {
   return FALSE;
  }
  foreach ($item as $key => $value) {
   $old->$key = $value;
  }
  return $old->save() ? $old : false;
 }
}
