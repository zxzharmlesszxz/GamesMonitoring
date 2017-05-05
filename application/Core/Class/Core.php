<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 10:59
 */

namespace Core;


/**
 * Class Core
 * @package Core
 */
class Core
{
    /**
     * @var
     */
    static public $instance;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $this->Config = Config::getInstance();
        $this->Router = new Router();
        $this->Modules = new Collection();
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