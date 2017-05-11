<?php

/**
 * Class Config
 */

namespace Core;
use Core\Interfaces\SingletonInterface;

/**
 * Class Config
 * @package Core
 */
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
        var_dump(__CLASS__);
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
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    private function loadConfigFile()
    {
        include_once(__DIR__ . '/../../config/config.inc.php');
        return $config;
    }
}
