<?php
class Modes extends DatabaseObject {
 protected static $table_name = "modes";
 protected static $db_fields = array('modeid', 'shortname', 'fullname','description');

 protected $modeid;
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
