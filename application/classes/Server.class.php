<?php

/***
* Server class
***/

class Server extends DatabaseObject {
 protected static $table_name = "servers";
 protected static $db_fields = array('serverid', 'addr', 'servername', 'game', 'mode', 'map' ,'players', 'maxplayers',
  'status', 'location', 'steam', 'regdate', 'new', 'site' ,'about');

 public $serverid;
 public $addr;
 public $servername;
 public $game;
 public $mode;
 public $map;
 public $players;
 public $maxplayers;
 public $status;
 public $location;
 public $steam;
 public $regdate;
 public $new;
 public $site;
 public $about;

 public static function add($addr = NULL) {
  $new = new static;
  $new->addr = empty($addr) ? NULL : trim($addr);
  return $new;
 }
}
