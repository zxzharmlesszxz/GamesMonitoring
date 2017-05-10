<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 10:59
 */

namespace Core;
use Core\Interfaces\ModuleInterface;
use Core\Module;

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
     * @var
     */
    public $Theme;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $this->Config = Config::getInstance();
        $this->Router = new Router();
        $this->Modules = new Collection();
        $this->CoreModules = new Collection();
        $this->loadCoreModules();
        $this->Session = $this->getCoreModule('Session');
        $theme = (!is_null($this->Config->THEME) ? $this->Config->THEME : $this->Config->DEFAULT_THEME);
        include_once $this->Config->PROJECT_ROOT . '/' .$this->Config->THEME_PATH . '/' . $theme . '/index.php';
        $themeClass = "\Theme\\$theme\Theme";
        $this->Theme = new $themeClass();
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
     * @return Core
     */
    static public function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @param $name
     * @param ModuleInterface $module
     */
    public function registerModule($name, ModuleInterface $module)
    {
        $this->Modules->addItem($module, $name);
    }

    /**
     * @param $name
     * @param ModuleInterface $module
     */
    protected function registerCoreModule($name, ModuleInterface $module)
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
}