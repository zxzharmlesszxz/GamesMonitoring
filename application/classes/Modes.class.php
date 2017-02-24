<?php
class Modes extends DatabaseObject {
 protected static $table_name = "modes";
 protected static $db_fields = array('modeid', 'shortname', 'fullname','description', 'gameid');

 protected $modeid;
 protected $shortname;
 protected $fullname;
 protected $gameid;
 public $description;

 public static function add(array $item) {
  $new = new static;
  $new->shortname = trim($item['shortname']);
  $new->fullname = trim($item['fullname']);
  $new->gameid = trim($item['gameid']);
  $new->description = trim($item['description']);
  return $new;
 }
}
