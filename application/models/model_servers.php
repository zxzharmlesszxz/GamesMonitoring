<?php

class Model_Servers extends Model {
 public function update(array $item) {
  $item = array_map("trim", $item);

  $old = $this->items->getItem($item['serverid']);
  unset($item['serverid']);
  if (!$old) {
   return FALSE;
  }
  foreach ($item as $key => $value) {
   $old->$key = $value;
  }
  return $old->save() ? $old : false;
 }
}
