<?php

class Model_Servers extends Model {
 public function __construct() {
  parent::__construct(); 
  foreach (Server::find_all() as $item) {
   $this->items->addItem($item, $item->serverid);
  }
 }

 public function create(array $item) {
  $new = Server::add($item);
  return $new->save() ? $new : false;
 }

 public function update(array $item) {
  foreach ($item as $key => $value) {
   $item[$key] = trim($value);
  }
  $u = $this->items->getItem($item['serverid']);
  unset($item['serverid']);
  if (!$u) {
   return FALSE;
  }
  foreach ($item as $key => $value) {
   $u->$key = $value;
  }
  return $u->save() ? $u : false;
 }
}
