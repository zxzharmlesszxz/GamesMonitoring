<?php

/***
* Server class
***/

class Server extends DatabaseObject {
 protected static $table_name = "servers";
 protected static $db_fields = array('serverid', 'servername', 'addr', 'status', 'regdate', 'game', 'mode', 'map',
  'players', 'maxplayers', 'location', 'steam', 'new', 'site', 'about', 'vip', 'top', 'secureServer',
  'passwordProtected', 'operatingSystem', 'botNumber', 'version');

 protected $serverid;
 protected $status;
 protected $regdate;
 protected $map;
 protected $players;
 protected $new;
 protected $vip;
 protected $top;
 protected $secureServer;
 protected $passwordProtected;
 protected $operatingSystem;
 protected $botNumber;
 protected $version;
 public $addr;
 public $servername;
 public $game;
 public $mode;
 public $maxplayers;
 public $location;
 public $steam;
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
  $new->vip = NULL;
  $new->top = NULL;
  $new->secureServer = NULL;
  $new->passwordProtected = NULL;
  $new->operatingSystem = NULL;
  $new->botNumber = NULL;
  $new->version = NULL;
  return $new;
 }

 public function setStatus($status = NULL) {
  $this->status = ($status === NULL) ? $this->status : $status;
 }

 public function setPlayers($players = NULL) {
  $this->players = $players;
 }

 public function setMap($map = NULL) {
  $this->map = $map;
 }

 public function setSecureServer($secureServer = NULL) {
  $this->secureServer = $secureServer;
 }
 public function setPasswordProtected($passwordProtected = NULL) {
  $this->passwordProtected = $passwordProtected;
 }
 public function setOperatingSystem($operatingSystem = NULL) {
  $this->operatingSystem = $operatingSystem;
 }
 public function setBotNumber($botNumber = NULL) {
  $this->botNumber = $botNumber;
 }
 public function setVersion($version = NULL) {
  $this->version = $version;
 }

 public function changeStatus() {
  $this->status = ($this->status == 1) ? 0 : 1;
  return $this->save();
 }
}
