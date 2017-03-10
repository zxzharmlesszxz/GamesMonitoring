<?php

class Model_Games extends Model {
 public function update(array $item) {
  $item = array_map("trim", $item);

  $old = $this->items->getItem($item['gameid']);
  unset($item['gameid']);
  if (!$old) {
   return FALSE;
  }
  foreach ($item as $key => $value) {
   $old->$key = $value;
  }
  return $old->save() ? $old : false;
 }
}
