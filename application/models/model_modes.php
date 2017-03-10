<?php

class Model_Modes extends Model {
 public function getAjax() {
  $array = '';#array();
  foreach ($this->items->getItems() as $key => $item) {
   //$array[$key] = json_encode($item);
   $array .= json_encode($item);
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
