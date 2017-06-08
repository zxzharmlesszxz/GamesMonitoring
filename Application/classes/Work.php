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
                //print "DELETE FROM " . DB_SERVERS . " WHERE server_id = '{$server['server_id']}';" . PHP_EOL;
                continue;
            }

            if ($server['status'] == 'off' || empty($server['servername'])) {
                $this->worker->getConnection()->real_query(
                    "UPDATE server SET
                    status = '0',
                    map = '',
                    players = '',
                    maxplayers = '' "
                    . (($server['status'] == 1) ? ", status_change = " . time() : "")
                    . " WHERE id='{$server['id']}';"
                );
                //print "UPDATE " . DB_SERVERS . " SET server_status = '0', server_map = '-', server_players = '-', server_maxplayers = '-' " . (($server['server_status'] == 1) ? ", status_change = " . time() : "") . " WHERE server_id='{$server['server_id']}';" . PHP_EOL;
                continue;
            }*/

            $name = $this->worker->getConnection()->real_escape_string(htmlspecialchars(trim($_server['serverName'])));
            $this->worker->getConnection()->real_query(
                "UPDATE server SET
                servername = '{$name}',
                map = '{$_server['mapName']}',
                players = '{$_server['playerNumber']}',
                botNumber = '{$_server['botNumber']}',
                version = '{$_server['version']}',
                secureServer = '{$_server['secureServer']}',
                operatingSystem = '{$_server['operatingSystem']}',
                passwordProtected = '{$_server['passwordProtected']}',
                maxplayers = '{$_server['maxPlayers']}', "
                . (empty($_server['serverName']) ? ", status = '0', status_change = NOW()" : ", status = '1', status_change = NOW()")
                . " WHERE id='{$value['id']}';"
            );
            print "UPDATE server SET
                servername = '{$name}',
                map = '{$_server['mapName']}',
                players = '{$_server['playerNumber']}',
                botNumber = '{$_server['botNumber']}',
                version = '{$_server['version']}',
                secureServer = '{$_server['secureServer']}',
                operatingSystem = '{$_server['operatingSystem']}',
                passwordProtected = '{$_server['passwordProtected']}',
                maxplayers = '{$_server['maxPlayers']}', "
                . (empty($_server['serverName']) ? ", status = '0', status_change = NOW()" : ", status = '1', status_change = NOW()")
                . " WHERE id='{$value['id']}';" . PHP_EOL;
        } while ($value !== null);
    }

}