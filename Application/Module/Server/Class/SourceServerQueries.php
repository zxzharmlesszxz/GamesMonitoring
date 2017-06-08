<?php

namespace Module\Server;

/**
 * Class SourceServerQueries
 * http://developer.valvesoftware.com/wiki/Server_Queries
 */
final class SourceServerQueries extends ServerQueries
{
    /**
     * @return array
     */
    public function getInfo()
    {
        $return = [
            'serverName' => null,
            'mapName' => null,
            'gameDir' => null,
            'gameDesc' => null,
            'playerNumber' => 0,
            'maxPlayers' => 0,
            'version' => null,
            'operatingSystem' => null,
            'passwordProtected' => null,
            'secureServer' => null,
            'botNumber' => null,
        ];

        if (!$this->connected)
            return $return;

        $this->send("\xFF\xFF\xFF\xFFTSource Engine Query\x00");
        if ($tmp = $this->read(true) or $tmp = $this->read()) {
            if ($tmp == 0x6d) {
                $this->getString();
                $return['serverName'] = $this->getString();
                $return['mapName'] = $this->getString();
                $return['gameDir'] = $this->getString();
                $return['gameDesc'] = $this->getString();
                $return['playerNumber'] = intval($this->getByte());
                $return['maxPlayers'] = intval($this->getByte());
                $return['version'] = intval($this->getByte());
                $this->getByte();
                $tmp = chr($this->getByte());
                $return['operatingSystem'] = ($tmp == 'l') ? 'Linux' : 'Windows';
                $return['passwordProtected'] = ($this->getByte() == 0x01) ? 1 : 0;
                if ($this->getByte() == 0x01) {
                    $this->getString();
                    $this->getString();
                    $this->raw = substr($this->raw, 11);
                }
                $return['secureServer'] = ($this->getByte() == 0x01) ? 1 : 0;
                $return['botNumber'] = intval($this->getByte());
            } elseif ($tmp == 0x49) {
                $return['version'] = intval($this->getByte());
                $return['serverName'] = $this->getString();
                $return['mapName'] = $this->getString();
                $return['gameDir'] = $this->getString();
                $return['gameDesc'] = $this->getString();
                $this->raw = substr($this->raw, 2);
                $return['playerNumber'] = intval($this->getByte());
                $return['maxPlayers'] = intval($this->getByte());
                $return['botNumber'] = intval($this->getByte());
                $this->getByte();
                $tmp = chr($this->getByte());
                $return['operatingSystem'] = ($tmp == 'l') ? 'Linux' : 'Windows';
                $return['passwordProtected'] = ($this->getByte() == 0x01) ? 1 : 0;
                $return['secureServer'] = ($this->getByte() == 0x01) ? 1 : 0;
            }
        } else {
            $this->disconnect();
        }
        return $return;
    }

    /**
     * @return array
     */
    function getPlayers()
    {
        $return = array();
        if (!$this->connected) return $return;
        $this->send("\xFF\xFF\xFF\xFF\x55\xFF\xFF\xFF\xFF");
        $tmp = $this->read();
        if ($tmp == 0x41) {
            $this->send("\xFF\xFF\xFF\xFF\x55" . $this->raw);
            $tmp = $this->read();
        } elseif (!$tmp) {
            $this->send("\xFF\xFF\xFF\xFF\x55" . $this->getChallenge());
            $tmp = $this->read();
        }
        if ($tmp == 0x44) {
            $num = $this->getByte();
            for ($i = 0; $i < $num; $i++) {
                $tmp = $this->getByte();
                $name = $this->getString();
                $kills = $this->getLong();
                $time = $this->getFloat();
                $return[] = array(
                    'name' => $name,
                    'score' => $kills,
                    'time' => gmdate("H:i:s", $time)
                );
            }
        }
        return $return;
    }

    /**
     * @return array
     */
    function getRules()
    {
        $return = array();
        if (!$this->connected) return $return;
        $this->send("\xFF\xFF\xFF\xFF\x56\xFF\xFF\xFF\xFF");
        $tmp = $this->read();
        if ($tmp == 0x41) {
            $this->send("\xFF\xFF\xFF\xFF\x56" . $this->raw);
            $tmp = $this->read();
        } elseif (!$tmp) {
            $this->send("\xFF\xFF\xFF\xFF\x56" . $this->getChallenge());
            $tmp = $this->read();
        }
        if ($tmp == 0x45) {
            $num = $this->getShort();
            for ($i = 0; $i < $num; $i++) {
                $name = $this->getString();
                $value = $this->getString();
                if ($name) $return[$name] = $value;
            }
        }
        return $return;
    }

    /**
     * @return bool|string
     */
    private function getChallenge()
    {
        if (!$this->connected) return false;
        $this->send("\xFF\xFF\xFF\xFF\x57");
        $this->read();
        return substr($this->raw, 5);
    }

    /**
     * @param bool $many_packets
     * @return int
     */
    protected function read($many_packets = false)
    {
        if ($many_packets) {
            parent::read(true);
            $this->getLong();
        } else {
            parent::read();
            if ($this->getLong() == -2) {
                $requestId = $this->getLong();
                $pacets = $this->getByte();
                $tmp = $this->getLong();
                if ($requestId < 0) {
                    $this->getLong();
                    $this->getByte();
                    $this->raw = substr(bzdecompress($this->raw), 4);
                } elseif (($tmp < 0) && (substr($this->raw, 0, 3) == "\xFF\xFF\xFF")) {
                    $this->raw = substr($this->raw, 3);
                }
                $tmp = $this->raw;
                for ($i = 1; $i < $pacets; $i++) {
                    parent::read();
                    $this->raw = $tmp . substr($this->raw, 9);
                    $tmp = $this->raw;
                }
            }
        }
        $byte = $this->getByte();
        return $byte;
    }
}