<?php
class Games extends DatabaseObject {
 protected static $table_name = "games";
 protected static $db_fields = array('gameid', 'shortname', 'fullname','description');

 protected $gameid;
 protected $shortname;
 protected $fullname;
 public $description;

 public static function add(array $new) {
  $new = new static;
  $new->shortname = trim($new['shortname']);
  $new->fullname = trim($new['fullname']);
  $new->description = trim($new['description']);
  return $new;
 }
}