<?php

/***
* Server class
***/

class Server extends DatabaseObject {
 protected static $table_name = "servers";
 protected static $db_fields = array('serverid', 'addr');

 public $serverid;
 public $addr;

 public static function add($addr = NULL) {
  $new = new static;
  $new->addr = empty($addr) ? NULL : trim($addr);
  return $new;
 }
}
