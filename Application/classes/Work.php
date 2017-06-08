<?php

/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 01.06.17
 * Time: 11:06
 */

/**
 * Work это задача, которая может выполняться параллельно
 */
class Work extends Threaded
{
    /**
     *
     */
    public function run()
    {
        do {
            $value = null;

            $provider = $this->worker->getProvider();

            // Синхронизируем получение данных
            $provider->synchronized(function ($provider) use (&$value) {
                $value = $provider->getNext();
            }, $provider);

            if ($value === null) {
                continue;
            }

            // Некая ресурсоемкая операция
            $sq = new \Module\Server\SourceServerQueries();
            $address = explode(':', $value['addr']);
            $sq->connect($address[0], $address[1]);
            $_server = $sq->getInfo();
/*
            if ($server['status'] == 'off' and ($server['status'] == 0) and time() - $server['status_change'] > 86400) {
                $this->worker->getConnection()->real_query(
                    "DELETE FROM server WHERE id = '{$server['id']}';"
                );
                continue;
            }
*/

            $name = $this->worker->getConnection()->real_escape_string(htmlspecialchars(trim($_server['serverName'])));
            $this->worker->getConnection()->real_query(
                "UPDATE server SET
                servername = '{$name}',
                map = '{$_server['mapName']}',
                players = '" . intval($_server['playerNumber']) . "',
                botNumber = '" . intval($_server['botNumber']) . "',
                version = '" . intval($_server['version']) . "',
                secureServer = '" . intval($_server['secureServer']) . "',
                operatingSystem = '{$_server['operatingSystem']}',
                passwordProtected = '" . intval($_server['passwordProtected']) . "',
                maxplayers = '" . intval($_server['maxPlayers']) . "', "
                . (empty($_server['serverName']) ? "status = '0'" : "status = '1'")
                . (((empty($_server['serverName']) and $value['status'] == 0) or $value['status'] == 1) ? "" : ", status_change = NOW()")
                . " WHERE id='{$value['id']}';"
            );
        } while ($value !== null);
    }

}