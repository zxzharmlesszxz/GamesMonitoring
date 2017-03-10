<?php

class Model_Games extends Model {
 
 public function __construct() {
  parent::__construct();
  foreach (Game::find_all() as $item) {
   $this->items->addItem($item, $item->gameid);
  }
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
