<?php

/**
 * Class Model_Servers
 */
class Model_Servers extends Model
{
    /**
     * @return array
     */
    public function getAjax()
    {
        $items = parent::getAjax()['data'];
        $result = array();
        foreach ($items as $id => $item) {
            $result[] = array(
                'serverid' => $item->serverid,
                'servername' => $item->servername,
                'addr' => $item->addr,
                'steam' => $item->steam,
                'maxplayers' => $item->maxplayers,
                'players' => $item->players,
                'map' => $item->map,
                'game' => $item->game,
                'mode' => $item->mode,
                'location' => $item->location,
                'botNumber' => $item->botNumber,
                'regdate' => $item->regdate,
                'site' => $item->site,
                'vip' => $item->vip,
                'top' => $item->top,
                'status' => $item->status,
            );
        }
        return array('data' => $result);
    }
}
