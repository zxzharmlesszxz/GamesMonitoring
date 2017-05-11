<?php

/**
 * Class Config
 */

namespace Core;
use Core\Interfaces\SingletonInterface;

final class Config implements SingletonInterface
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
        $this->_configuration = $this->loadConfigFile();
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
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
    
    private function loadConfigFile()
    {
        include_once(__DIR__ . '/../../config/config.inc.php');
        return $config;
    }
}
