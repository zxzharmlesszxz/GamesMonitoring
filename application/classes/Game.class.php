<?php
class Game extends DatabaseObject {
 protected static $table_name = "games";
 protected static $db_fields = array('gameid', 'shortname', 'fullname','description');

 protected $gameid;
 public $shortname;
 public $fullname;
 public $description;

 public static function add(array $item) {
  $new = new static;
  $new->shortname = trim($item['shortname']);
  $new->fullname = trim($item['fullname']);
  $new->description = trim($item['description']);
  return $new;
 }
}
