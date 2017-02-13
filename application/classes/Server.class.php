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
 public $maxplayers;
 public $location;
 public $steam;
 public $regdate;
 public $new;
 public $site;
 public $about;

 public static function add($addr, $servername, $game, $mode = NULL, $maxplayers = 0, $location, $steam = 0, $site = NULL, $about = NULL) {
  $new = new static;
  $new->addr = empty($addr) ? NULL : trim($addr);
  $new->servername = empty($servername) ? NULL : trim($servername);
  $new->game = empty($game) ? NULL : trim($game);
  $new->mode = empty($mode) ? NULL : trim($mode);
  $new->maxplayers = empty($maxplayers) ? NULL : intval(trim($maxplayers));
  $new->location = empty($location) ? NULL : trim($location);
  $new->steam = empty($steam) ? NULL : intval(trim($steam));
  $new->site = empty($site) ? NULL : trim($site);
  $new->about = empty($about) ? NULL : trim($about);
  return $new;
 }
}
