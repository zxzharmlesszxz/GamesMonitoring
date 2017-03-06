<?php

class Model_Cron extends Model {
 
 public function get_data() {
  $items = new Collection;
  foreach (Server::find_all() as $item) {
   $items->addItem($item, $item->serverid);
  }
  return $items;
 }

 protected function get($itemid) {
  return $this->get_data()->getItem($itemid);
 }

 protected function save(Server $server){
  return $server->save() ? $server : false;
 }

 protected function update(array $item) {
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
