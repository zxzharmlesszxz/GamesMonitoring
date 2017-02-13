<?php

class Model_Servers extends Model {
 
 public function get_data() {
  $items = new Collection;
  foreach (Server::find_all() as $item) {
   $items->addItem($item, $item->serverid);
  }
  return $items;
 }

 public function get($itemid) {
  return $this->get_data()->getItem($itemid);
 }

 public function save(Server $server){
  return $server->save() ? $server : false;
 }

 public function create(array $item) {
  $item = Server::add($item);
  var_dump($item);
  return $item->save() ? $item : false;
 }

 public function delete($itemid) {
  return $this->get_data()->getItem($itemid)->delete();
 }

 public function update(array $item) {
  foreach ($item as $key => $value) {
   $item[$key] = trim($value);
  }
  $u = $this->get_data()->getItem($item['serverid']);
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
