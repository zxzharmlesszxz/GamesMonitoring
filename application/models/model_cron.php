<?php

class Model_Cron extends Model {
 
 public function get_data() {
  $this->items = new Collection;
  foreach (Server::find_all() as $item) {
   $this->items->addItem($item, $item->serverid);
  }
  return $this->cron_update();
 }

 protected function cron_update() {
  foreach ($this->items->keys() as $id) {
   $item = $this->items->getItem($id);
   $sq = new SourceServerQueries();
   $server = $item->addr;
   $address = explode(':', $server);
   $sq->connect($address[0], $address[1]);
   $item->info = $sq->getInfo();
   $item->setMap($item->info['mapName']);
   $item->maxplayers = $item->info['maxPlayers'];
   $item->setStatus((empty($item->info)) ? 0 : 1);
   #$item->players_info = $sq->getPlayers();
   $item->setPlayers($item->info['playerNumber']);
   $item->setSecureServer($item->info['secureServer']);
   $item->setPasswordProtected($item->info['passwordProtected']);
   $item->setOperatingSystem($item->info['operatingSystem']);
   $item->setBotNumber($item->info['botNumber']);
   $item->setVersion($item->info['version']);
   #$item->rules = $sq->getRules();
   $sq->disconnect();
   $item->save();
   $this->items->deleteItem($id);
   $this->items->addItem($item, $id);

  }
  return $this->items;
 }

 protected function get($itemid) {
  return $this->items->getItem($itemid);
 }

 protected function save(Server $server){
  return $server->save() ? $server : false;
 }
}
