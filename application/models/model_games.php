<?php

class Model_Games extends Model {
 
 public function __construct() {
  parent::__construct();
  foreach (Games::find_all() as $item) {
   $this->items->addItem($item, $item->gameid);
  }
 }

 public function create(array $item) {
  $new = Games::add($item);
  return $new->save() ? $new : false;
 }

 public function update(array $item) {
  foreach ($item as $key => $value) {
   $item[$key] = trim($value);
  }
  $u = $this->items->getItem($item['gameid']);
  unset($item['gameid']);
  if (!$u) {
   return FALSE;
  }
  foreach ($item as $key => $value) {
   $u->$key = $value;
  }
  return $u->save() ? $u : false;
 }
}
