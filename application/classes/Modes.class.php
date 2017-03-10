<?php
class Modes extends DatabaseObject {
 protected static $table_name = "modes";
 protected static $db_fields = array('modeid', 'shortname', 'fullname','description');

 protected $modeid;
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

 public function __sleep() {
  return $this->attributes();
 }

 public function __toArray() {
  return $this->__sleep();
 }
}
