<?php

/**
 * Class Config
 */

namespace Core;
final class Config
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @var
     */
    protected $_configuration;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        include_once(__DIR__ . '/../../config/config.inc.php');
        $this->_configuration = \$config;
    }

    /**
     * @param $key
     * @return null
     */
    final public function __get($key)
    {
        return isset($this->_configuration[$key]) ? $this->_configuration[$key] : NULL;
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     *
     */
    private function __wakeup()
    {
    }


    /**
     * @return Config
     */
    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
