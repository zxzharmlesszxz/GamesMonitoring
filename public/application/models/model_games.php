<?php

class Model_Games extends Model {
 
 public function get_data() {
  $items = new Collection;
  foreach (Games::find_all() as $item) {
   $items->addItem($item, $item->gameid);
  }
  return $items;
 }

 public function get($itemid) {
  return $this->get_data()->getItem($itemid);
 }

 public function save(Game $game){
  return $game->save() ? $game : false;
 }

 public function create(array $item) {
  $new = Games::add($item);
  return $new->save() ? $new : false;
 }

 public function delete($itemid) {
  return $this->get_data()->getItem($itemid)->delete();
 }

 public function update(array $item) {
  foreach ($item as $key => $value) {
   $item[$key] = trim($value);
  }
  $u = $this->get_data()->getItem($item['gameid']);
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
