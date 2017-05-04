<?php

/**
 * Class Model_Cron
 */
class Model_Cron extends Model
{
    /**
     * Model_Cron constructor.
     */
    public function __construct()
    {
        parent::__construct("Server");
    }

    /**
     * @return Collection
     */
    public function get_data()
    {
        return $this->cron_update();
    }

    /**
     * @return Collection
     */
    protected function cron_update()
    {
        foreach ($this->items->keys() as $id) {
            $item = $this->items->getItem($id);
            $sq = new SourceServerQueries();
            $server = $item->addr;
            $address = explode(':', $server);
            $sq->connect($address[0], $address[1]);
            $item->info = $sq->getInfo();
            $item->setMap($item->info['mapName']);
            $item->setServername($item->info['serverName']);
            $item->setMaxPlayers($item->info['maxPlayers']);
            $item->setPlayers($item->info['playerNumber']);
            $item->setStatus((empty($item->info)) ? 0 : 1);
            $item->setPlayers($item->info['playerNumber']);
            $item->setSecureServer($item->info['secureServer']);
            $item->setPasswordProtected($item->info['passwordProtected']);
            $item->setOperatingSystem($item->info['operatingSystem']);
            $item->setBotNumber($item->info['botNumber']);
            $item->setVersion($item->info['version']);
            #$item->players_info = $sq->getPlayers();
            #$item->rules = $sq->getRules();
            $sq->disconnect();
            $item->save();
            $this->items->deleteItem($id);
            $this->items->addItem($item, $id);
        }
        return $this->items;
    }
}
