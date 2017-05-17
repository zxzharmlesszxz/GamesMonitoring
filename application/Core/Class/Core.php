<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 10:59
 */

namespace Core;

use Core\Interfaces\SingletonInterface;

/**
 * Class Core
 * @package Core
 */
class Core implements SingletonInterface
{
    /**
     * @var
     */
    static public $instance = null;

    /**
     * @var Collection
     */
    static protected $Modules;

    /**
     * @var Collection
     */
    static protected $CoreModules;

    /**
     * @var Module\Session
     */
    static public $Session;

    /**
     * @var Router
     */
    static protected $Router;

    /**
     * @var Config
     */
    static protected $Config;

    /**
     * @var Theme
     */
    static public $Theme;

    /**
     * Core constructor.
     */
    private function __construct()
    {
        //echo __METHOD__ . '<br>';
        static::$Config = Config::getInstance();
        static::$Router = Router::getInstance();
        static::$Modules = new Collection();
        static::$CoreModules = new Collection();
        $this->loadCoreModules();
        static::$Session = $this->getCoreModule('Session');
        static::$Theme = $this->getTheme();
    }

    /**
     * @param $key
     * @return null
     */
    final public function __get($key)
    {
        //echo __METHOD__ . '<br>';
        return isset($this->$key) ? $this->$key : null;
    }

    /**
     *
     */
    final public function __clone()
    {
    }

    /**
     *
     */
    final public function __wakeup()
    {
    }

    /**
     * @return Core
     */
    static public function getInstance()
    {
        //echo __METHOD__ . '<br>';
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $name
     * @param Module $module
     */
    public function registerModule($name, Module $module)
    {
        //echo __METHOD__ . '<br>';
        static::$Modules->addItem($module, $name);
    }

    /**
     * @param $name
     * @param Module $module
     */
    protected function registerCoreModule($name, Module $module)
    {
        //echo __METHOD__ . '<br>';
        static::$CoreModules->addItem($module, $name);
    }

    /**
     *
     */
    protected function loadCoreModules()
    {
        //echo __METHOD__ . '<br>';
        $modulesDir = dir(static::$Config->PROJECT_ROOT . '/' . static::$Config->CORE_MODULE_PATH);

        while (false !== ($module = $modulesDir->read())) {
            switch ($module) {
                case '.':
                case '..':
                    break;
                default:
                    include_once static::$Config->PROJECT_ROOT . '/' . static::$Config->CORE_MODULE_PATH . '/' . $module . '/module.php';
                    $moduleName = "Core\\Module\\$module";
                    if (class_exists($moduleName))
                        $this->registerCoreModule($module, new $moduleName);
                    break;
            }
        }
    }

    /**
     * @param $name
     */
    public function unRegisterModule($name)
    {
        //echo __METHOD__ . '<br>';
        static::$Modules->deleteItem($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    static public function getModule($name)
    {
        //echo __METHOD__ . '<br>';
        return static::$Modules->getItem($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    static public function getCoreModule($name)
    {
        //echo __METHOD__ . '<br>';
        return static::$CoreModules->getItem($name);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    static protected function getTheme()
    {
        //echo __METHOD__ . '<br>';
        $theme = (!is_null(static::$Config->THEME) ? static::$Config->THEME : static::$Config->DEFAULT_THEME);
        @include_once static::$Config->PROJECT_ROOT . '/' . static::$Config->THEME_PATH . '/' . $theme . '/index.php';
        $themeClass = "\Theme\\$theme\Theme";
        if (!class_exists($themeClass)) {
            throw new \Exception("Theme $theme not found!");
        }
        return new $themeClass();
    }
}