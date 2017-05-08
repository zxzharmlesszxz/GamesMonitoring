<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 10:59
 */

namespace Core;
use Core\Interfaces\ModuleInterface;

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

    protected $CoreModules;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $this->Config = Config::getInstance();
        $this->Router = new Router();
        $this->Modules = new Collection();
        $this->CoreModules = new Collection();
        $modulesDir = dir($this->Config->PROJECT_ROOT . '/' . $this->Config->CORE_MODULES_PATH);
        while (false !== ($module = $modulesDir->read()))
        {
            switch ($module) {
                case '.':
                case '..':
                    break;
                default:
                    include_once $this->Config->PROJECT_ROOT . '/' . $this->Config->CORE_MODULES_PATH . '/' . $module . '/module.php';
                    $moduleName = "Module\\$module";
                    $this->registerCoreModule($module, new $moduleName);
                    break;
            }
        }
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
     * @return Config
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

    protected function registerCoreModule($name, ModuleInterface $module)
    {
        $this->CoreModules->addItem($module, $name);
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
     */
    public function getModule($name)
    {
        $this->Modules->getItem($name);
    }
}