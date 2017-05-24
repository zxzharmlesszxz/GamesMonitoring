<?php

namespace Module\Server;

/**
 * Class Model
 * @package Module\Server
 */
class Model extends \Core\Model
{
    public function get()
    {
        $template = file_get_contents(__DIR__ . '/../View/servers_view.php');
        $content = "";
        foreach (Server::find_all() as $item) {
            $content .= "<tr><td>$item->servername</td><td>$item->address</td><td>$item->steam</td>
<td>$item->players/$item->botNumber/$item->maxplayers</td>
<td>$item->map</td><td>$item->game</td><td>$item->mode</td>
<td>$item->location</td><td>$item->regdate</td><td>$item->site</td>
<td>$item->status</td><td>$item->vip</td><td>$item->top</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
