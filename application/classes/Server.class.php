<?php

/***
* Server class
***/

class Server extends DatabaseObject {
 protected static $table_name = "servers";
 protected static $db_fields = array('serverid', 'addr', 'servername', 'game', 'mode', 'maxplayers', 'location',
  'steam', 'regdate', 'new', 'site' ,'about');

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

 public static function add(array $item) {
  $new = new static;
  $new->addr = empty($item['addr']) ? NULL : trim($item['addr']);
  $new->servername = empty($item['servername']) ? NULL : trim($item['servername']);
  $new->game = empty($item['game']) ? NULL : trim($item['game']);
  $new->mode = empty($item['mode']) ? NULL : trim($item['mode']);
  $new->maxplayers = empty($item['maxplayers']) ? NULL : intval(trim($item['maxplayers']));
  $new->location = empty($item['location']) ? NULL : trim($item['location']);
  $new->steam = empty($item['steam']) ? NULL : intval(trim($item['steam']));
  $new->regdate = NULL;
  $new->new = NULL;
  $new->site = empty($item['site']) ? NULL : trim($item['site']);
  $new->about = empty($item['about']) ? NULL : trim($item['about']);
  return $new;
 }
}
