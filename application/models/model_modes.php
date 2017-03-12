<?php

class Model_Modes extends Model {
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

 public function getAjax() {
  $items = parent::getAjax();
  $result = array();
  foreach ($items as $id => $item) {
   array_push($result, $item);
  }
  return $result;
 }
}
