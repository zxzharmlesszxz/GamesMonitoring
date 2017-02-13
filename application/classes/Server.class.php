<?php

/***
* Server class
***/

class Server extends DatabaseObject {
 protected static $table_name = "servers";
 protected static $db_fields = array('serverid', 'addr', 'servername', 'status', 'regdate');

 public $serverid;
 public $addr;
 public $servername;
 public $status;
 public $regdate;

 public static function add(array $item) {
  $new = new static;
  $new->addr = empty($item['addr']) ? NULL : trim($item['addr']);
  $new->servername = empty($item['servername']) ? NULL : trim($item['servername']);
  $new->status =  NULL;
  $new->regdate = date("Y-m-d H:i:s");
  return $new;
 }
}
