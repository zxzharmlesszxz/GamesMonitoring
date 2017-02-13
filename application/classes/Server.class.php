<?php

/***
* Server class
***/

class Server extends DatabaseObject {
 protected static $table_name = "servers";
 protected static $db_fields = array('serverid', 'servername', 'addr', 'status', 'regdate', 'game', 'mode', 'map',
  'players', 'maxplayers', 'location', 'steam', 'new', 'site', 'about');

 public $serverid;
 public $addr;
 public $servername;
 protected $status;
 protected $regdate;
 public $game;
 public $mode;
 protected $map;
 protected $players;
 public $maxplayers;
 public $location;
 public $steam;
 protected $new;
 public $site;
 public $about;

 public static function add(array $item) {
  $new = new static;
  $new->addr = empty($item['addr']) ? NULL : trim($item['addr']);
  $new->servername = empty($item['servername']) ? NULL : trim($item['servername']);
  $new->status =  NULL;
  $new->regdate = date("Y-m-d H:i:s");
  $new->game = empty($item['game']) ? NULL : trim($item['game']);
  $new->mode = empty($item['mode']) ? NULL : trim($item['mode']);
  $new->map = NULL;
  $new->players = NULL;
  $new->maxplayers = empty($item['maxplayers']) ? NULL : intval(trim($item['maxplayers']));
  $new->location = empty($item['location']) ? NULL : trim($item['location']);
  $new->steam = empty($item['steam']) ? NULL : intval(trim($item['steam']));
  $new->new = 1;
  $new->site = empty($item['site']) ? NULL : trim($item['site']);
  $new->about = empty($item['about']) ? NULL : trim($item['about']);
  return $new;
 }
}
