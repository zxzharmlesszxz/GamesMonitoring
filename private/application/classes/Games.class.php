<?php
class Games extends DatabaseObject {
 protected static $table_name = "games";
 protected static $db_fields = array('gameid', 'shortname', 'fullname','description');

 protected $gameid;
 protected $shortname;
 protected $fullname;
 public $description;

 public static function add(array $item) {
  $new = new static;
  $new->shortname = trim($item['shortname']);
  $new->fullname = trim($item['fullname']);
  $new->description = trim($item['description']);
  return $new;
 }
}