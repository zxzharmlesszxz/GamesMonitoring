<?php

class Model_Modes extends Model {
 
 public function get_data() {
  $items = new Collection;
  foreach (Modes::find_all() as $item) {
   $items->addItem($item, $item->modeid);
  }
  return $items;
 }

 public function get($itemid) {
  return $this->get_data()->getItem($itemid);
 }

 public function save(Mode $mode){
  return $mode->save() ? $mode : false;
 }

 public function create(array $item) {
  $new = Modes::add($item);
  return $new->save() ? $new : false;
 }

 public function delete($itemid) {
  return $this->get_data()->getItem($itemid)->delete();
 }

 public function update(array $item) {
  foreach ($item as $key => $value) {
   $item[$key] = trim($value);
  }
  $u = $this->get_data()->getItem($item['modeid']);
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
