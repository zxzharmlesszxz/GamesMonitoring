<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 10:59
 */

namespace Core;

use Core\Interfaces\ModuleInterface;
use Core\Interfaces\SingletonInterface;

/**
 * Class Core
 * @package Core
 */
class Core //implements SingletonInterface
{
    /**
     * @var
     */
    static public $instance = null;

    /**
     * @var Collection
     */
    protected $Modules;

    /**
     * @var Collection
     */
    protected $CoreModules;

    /**
     * @var Module\Session
     */
    public $Session;

    /**
     * @var Router
     */
    protected $Router;

    /**
     * @var Config
     */
    protected $Config;

    /**
     * @var Theme
     */
    public $Theme;

    /**
     * Core constructor.
     */
    private function __construct()
    {
        $this->Config = Config::getInstance();
        #$this->Router = Router::getInstance();
        $this->Modules = new Collection();
        $this->CoreModules = new Collection();
        $this->loadCoreModules();
        $this->Session = $this->getCoreModule('Session');
        $this->Theme = $this->getTheme();
    }

    /**
     * @param $key
     * @return null
     */
    final public function __get($key)
    {
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
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $name
     * @param Module $module
     */
    public function registerModule($name, ModuleInterface $module)
    {
        $this->Modules->addItem($module, $name);
    }

    /**
     * @param $name
     * @param Module $module
     */
    protected function registerCoreModule($name, Module $module)
    {
        $this->CoreModules->addItem($module, $name);
    }

    /**
     *
     */
    protected function loadCoreModules()
    {
        $modulesDir = dir($this->Config->PROJECT_ROOT . '/' . $this->Config->CORE_MODULE_PATH);

        while (false !== ($module = $modulesDir->read()))
        {
            switch ($module) {
                case '.':
                case '..':
                    break;
                default:
                    include_once $this->Config->PROJECT_ROOT . '/' . $this->Config->CORE_MODULE_PATH . '/' . $module . '/module.php';
                    $moduleName = "Core\\Module\\$module";
                    $this->registerCoreModule($module, new $moduleName);
                    break;
            }
        }
    }

    /**
     * @param $name
     */
    public function unregisterModule($name)
    {
        $this->Modules->deleteItem($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getModule($name)
    {
        return $this->Modules->getItem($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getCoreModule($name)
    {
       return  $this->CoreModules->getItem($name);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    protected function getTheme()
    {
        $theme = (!is_null($this->Config->THEME) ? $this->Config->THEME : $this->Config->DEFAULT_THEME);
        @include_once $this->Config->PROJECT_ROOT . '/' .$this->Config->THEME_PATH . '/' . $theme . '/index.php';
        $themeClass = "\Theme\\$theme\Theme";
        if (!class_exists($themeClass)) {
            throw new \Exception("Theme $theme not found!");
        }
        return new $themeClass();
    }
}