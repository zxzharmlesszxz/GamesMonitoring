<?php

class Model_Cron extends Model {
 
 public function get_data() {
  $this->items = new Collection;
  foreach (Server::find_all() as $item) {
   $this->items->addItem($item, $item->serverid);
  }
  return $this->cron_update();
 }

 protected cron_update() {
  $data = new Collection;
  foreach ($this->items as $id => $item) {
   $sq = new SourceServerQueries();
   $server = $item->addr;
   $address = explode(':', $server);
   $sq->connect($address[0], $address[1]);
   $item->info = $sq->getInfo();
   $item->players_info = $sq->getPlayers();
   $item->rules = $sq->getRules();
   $sq->disconnect();
   $data->addItem($item, $id);
  }
  return $data;
 }

 protected function get($itemid) {
  return $this->items->getItem($itemid);
 }

 protected function save(Server $server){
  return $server->save() ? $server : false;
 }

 protected function update(array $item) {
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
