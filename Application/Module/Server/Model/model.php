<?php

namespace Module\Server;

use Core\Core;

/**
 * Class Model
 * @package Module\Server
 */
class Model extends \Core\Model
{
    /**
     * @param array $items
     * @return array
     */
    protected function ajax(array $items)
    {
        $content = array();
        foreach ($items as $item) {
            $content['data'][] = array('id' => $item->id, 'serverName' => $item->servername, 'address' => $item->addr,
                'steam' => $item->steam, 'players' => $item->players, 'botNumber' => $item->botNumber, 'maxPlayers' => $item->maxplayers,
                'map' => $item->map, 'game' => $item->game, 'mode' => $item->mode, 'location' => $item->location,
                'regDate' => $item->regdate, 'site' => $item->site, 'status' => $item->status, 'vip' => $item->vip,
                'top' => $item->top);
        }
        return $content;
    }

    /**
     * @param array $items
     * @return string
     */
    protected function str(array $items)
    {
        $content = "";
        foreach ($items as $item) {
            $content .= "<tr><td>$item->servername</td><td>$item->addr</td><td>$item->steam</td><td>$item->players/$item->botNumber/$item->maxplayers</td><td>$item->map</td><td>$item->game</td><td>$item->mode</td><td>$item->location</td><td>$item->regdate</td><td>$item->site</td><td>$item->status</td><td>$item->vip</td><td>$item->top</td></tr>\n";
        }
        return $content;
    }

    protected function show(Server $server)
    {
        $template = file_get_contents(__DIR__ . '/../View/server_view.php');
        $content = "";
        $sq = new SourceServerQueries();
        $address = explode(':', $server->addr);
        $sq->connect($address[0], $address[1]);
        $server->info = $sq->getInfo();
        $server->players_info = $sq->getPlayers();
        $server->rules = $sq->getRules();
        $sq->disconnect();
        $template = str_replace('%serverName%', $server->servername, $template);
        $template = str_replace('%id%', $server->id, $template);
        $template = str_replace('%address%', $server->addr, $template);
        $template = str_replace('%game%', $server->game, $template);
        $template = str_replace('%map%', $server->map, $template);
        $template = str_replace('%version%', $server->version, $template);
        $template = str_replace('%players%', $server->players, $template);
        $template = str_replace('%botNumber%', $server->botNumber, $template);
        $template = str_replace('%maxPlayers%', $server->maxplayers, $template);
        $template = str_replace('%secureServer%', $server->secureServer, $template);
        $template = str_replace('%passwordProtected%', $server->passwordProtected, $template);
        $template = str_replace('%operatingSystem%', $server->operatingSystem, $template);
        $template = str_replace('%about%', $server->about, $template);
        $playersInfo = "";
        foreach ($server->players_info as $num => $player) {
            $playersInfo .= "<tr><td>{$num}</td><td>{$player['name']}</td><td>{$player['score']}</td><td>{$player['time']}</td></tr>";
        }
        $template = str_replace('%playersInfo%', $playersInfo, $template);
        $rules = "";
        foreach ($server->rules as $key => $value) {
            $rules .= "<tr><td>{$key}</td><td>{$value}</td></tr>";
        }
        $template = str_replace('%rules%', $rules, $template);
        return $template;
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        if (isset($query['ajax']) and $query['ajax'] == true) {
            return $this->ajax(Server::find_all());
        } elseif (isset($query['id'])) {
            return $this->show(Server::find_by_id(intval($query['id'])));
        } else {
            $template = file_get_contents(__DIR__ . '/../View/servers_view.php');

            if (Core::getInstance()->Session->get('logged_in') != null) {
                $access = "$('#table').DataTable({
            \"processing\": true,
            \"ajax\": {
                \"url\": \"/server/get/?ajax=true\",
                \"dataSrc\": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.data.length; i++) {
                        var item = json.data[i];
                        if (item.status == 0)
                            continue;
                        return_data.push({
                            'server': '<a href=\"/server/get/?id=' + item.id + '\">' + item.serverName + '</a>' +
                            '<span class=\"actions\">' +
                            '<button class=\"delete\" title=\"Delete\" data-id=\"' + item.id + '\" data-type=\"server\"></button>' +
                            '<button class=\"edit\" title=\"Edit\" onclick=\"location.href=\'/server/edit/?id=' + item.id + '\'\"></button>' +
                            '</span>',
                            'address': item.address,
                            'steam': '<input class=\"steam\" type=\"checkbox\" data-id=\"' + item.id + '\" value=\"' + item.steam + '\" data-type=\"server\" disabled readonly />',
                            'players': item.players + \"/\" + item.botNumber + \"/\" + item.maxPlayers,
                            'map': '<div class=\"map\" data-icon=\"/images/maps/' + item.game + '/' + item.map + '.png\"><span>' + item.map + '</span></div>',
                            'game': item.game,
                            'mode': item.mode,
                            'location': item.location,
                            'regDate': item.regDate,
                            'site': item.site,
                            'status': '<input class=\"status\" type=\"checkbox\" data-id=\"' + item.id + '\" value=\"' + item.status + '\" data-type=\"server\" disabled readonly />',
                            'vip': '<input class=\"vip\" type=\"checkbox\" data-id=\"' + item.id + '\" value=\"' + item.vip + '\" data-type=\"server\" disabled readonly />',
                            'top': item.top
                        })
                    }
                    return return_data;
                }
            },
            \"columns\": [
                {\"data\": \"server\"},
                {\"data\": \"address\"},
                {\"data\": \"steam\"},
                {\"data\": \"players\"},
                {\"data\": \"map\"},
                {\"data\": \"game\"},
                {\"data\": \"mode\"},
                {\"data\": \"location\"},
                {\"data\": \"regDate\"},
                {\"data\": \"site\"},
                {\"data\": \"status\"},
                {\"data\": \"vip\"},
                {\"data\": \"top\"}
            ]
        });";
            } else {
                $access = "$('#table').DataTable({
            \"processing\": true,
            \"ajax\": {
                \"url\": \"/server/get/?ajax=true\",
                \"dataSrc\": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.data.length; i++) {
                        var item = json.data[i];
                        if (item.status == 0)
                            continue;
                        return_data.push({
                            'server': '<a href=\"/server/get/?id=' + item.id + '\">' + item.serverName + '</a>',
                            'address': item.address,
                            'steam': '<input class=\"steam\" type=\"checkbox\" data-id=\"' + item.id + '\" value=\"' + item.steam + '\" data-type=\"server\" disabled readonly />',
                            'players': item.players + \"/\" + item.botNumber + \"/\" + item.maxPlayers,
                            'map': '<div class=\"map\" data-icon=\"/images/maps/' + item.game + '/' + item.map + '.png\"><span>' + item.map + '</span></div>',
                            'game': item.game,
                            'mode': item.mode,
                            'location': item.location,
                            'regDate': item.regDate,
                            'site': item.site,
                            'status': '<input class=\"status\" type=\"checkbox\" data-id=\"' + item.id + '\" value=\"' + item.status + '\" data-type=\"server\" disabled readonly />',
                            'vip': '<input class=\"vip\" type=\"checkbox\" data-id=\"' + item.id + '\" value=\"' + item.vip + '\" data-type=\"server\" disabled readonly />',
                            'top': item.top
                        })
                    }
                    return return_data;
                }
            },
            \"columns\": [
                {\"data\": \"server\"},
                {\"data\": \"address\"},
                {\"data\": \"steam\"},
                {\"data\": \"players\"},
                {\"data\": \"map\"},
                {\"data\": \"game\"},
                {\"data\": \"mode\"},
                {\"data\": \"location\"},
                {\"data\": \"regDate\"},
                {\"data\": \"site\"},
                {\"data\": \"status\"},
                {\"data\": \"vip\"},
                {\"data\": \"top\"}
            ]
        });";
            }

            $template = str_replace('%access%', $access, $template);
            return str_replace('%content%', $this->str(Server::find_all()), $template);
        }
    }
}
