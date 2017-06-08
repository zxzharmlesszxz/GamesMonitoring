<?php

namespace Module\Server;

use Core\Module\Database\DatabaseObject;

/***
 * Server class
 ***/
class Server extends DatabaseObject
{
    /**
     * @var string
     */
    protected static $table_name = "server";
    /**
     * @var array
     */
    protected static $db_fields = array('id', 'servername', 'addr', 'status', 'regdate', 'game', 'mode', 'map',
        'players', 'maxplayers', 'location', 'steam', 'new', 'Site', 'about', 'vip', 'top', 'secureServer',
        'passwordProtected', 'operatingSystem', 'botNumber', 'version');

    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $status;
    /**
     * @var
     */
    protected $regdate;
    /**
     * @var
     */
    protected $map;
    /**
     * @var
     */
    protected $players;
    /**
     * @var
     */
    protected $new;
    /**
     * @var
     */
    protected $vip;
    /**
     * @var
     */
    protected $top;
    /**
     * @var
     */
    protected $secureServer;
    /**
     * @var
     */
    protected $passwordProtected;
    /**
     * @var
     */
    protected $operatingSystem;
    /**
     * @var
     */
    protected $botNumber;
    /**
     * @var
     */
    protected $version;
    /**
     * @var
     */
    protected $servername;
    /**
     * @var
     */
    protected $maxplayers;
    /**
     * @var
     */
    public $addr;
    /**
     * @var
     */
    public $game;
    /**
     * @var
     */
    public $mode;
    /**
     * @var
     */
    public $location;
    /**
     * @var
     */
    public $steam;
    /**
     * @var
     */
    public $site;
    /**
     * @var
     */
    public $about;

    /**
     * @param array $item
     * @return static
     */
    public static function add(array $item)
    {
        $new = new static;
        $new->addr = empty($item['addr']) ? NULL : trim($item['addr']);
        $new->servername = NULL;
        $new->status = NULL;
        $new->regdate = date("Y-m-d H:i:s");
        $new->game = empty($item['game']) ? NULL : trim($item['game']);
        $new->mode = empty($item['mode']) ? NULL : trim($item['mode']);
        $new->map = NULL;
        $new->players = NULL;
        $new->maxplayers = NULL;
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

    /**
     * @param null $status
     */
    public function setStatus($status = NULL)
    {
        $this->status = ($status === NULL) ? $this->status : $status;
    }

    /**
     * @param null $players
     */
    public function setPlayers($players = NULL)
    {
        $this->players = $players;
    }

    /**
     * @param null $map
     */
    public function setMap($map = NULL)
    {
        $this->map = $map;
    }

    /**
     * @param null $maxplayers
     */
    public function setMaxPlayers($maxplayers = NULL)
    {
        $this->maxplayers = $maxplayers;
    }

    /**
     * @param null $servername
     */
    public function setServername($servername = NULL)
    {
        $this->servername = $servername;
    }

    /**
     * @param null $secureServer
     */
    public function setSecureServer($secureServer = NULL)
    {
        $this->secureServer = $secureServer;
    }

    /**
     * @param null $passwordProtected
     */
    public function setPasswordProtected($passwordProtected = NULL)
    {
        $this->passwordProtected = $passwordProtected;
    }

    /**
     * @param null $operatingSystem
     */
    public function setOperatingSystem($operatingSystem = NULL)
    {
        $this->operatingSystem = $operatingSystem;
    }

    /**
     * @param null $botNumber
     */
    public function setBotNumber($botNumber = NULL)
    {
        $this->botNumber = $botNumber;
    }

    /**
     * @param null $version
     */
    public function setVersion($version = NULL)
    {
        $this->version = $version;
    }

    /**
     * @return bool
     */
    public function changeStatus()
    {
        $this->status = ($this->status == 1) ? 0 : 1;
        return $this->save();
    }
}
