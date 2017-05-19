<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 11:14
 */

namespace Core;

use Core\Interfaces\ModuleInterface;

/**
 * Class Module
 * @package Core
 */
abstract class Module implements ModuleInterface
{
    /**
     * @var
     */
    protected $Controller;

    /**
     * @var Collection
     */
    protected $Routes;

    /**
     * Module constructor.
     */
    public function __construct()
    {
        //$class = explode('\\', get_called_class());
        $controller = get_called_class() . '\Controller';
        $model = get_called_class() . '\Model';
        //$classs = get_called_class() . '\\' . end($class);
        $this->Controller = new $controller(new $model);
        $this->Routes = new Collection();
    }

    /**
     * @param $Module
     * @param $Action
     * @return mixed|void
     */
    public function addRoute(string $Module, string $Action)
    {
        //echo get_called_class() . __METHOD__ . '<br>';
        $this->Routes->addItem("/$Module/$Action", $Action);
    }

    /**
     * @param $action
     * @return mixed
     */
    public function action($action)
    {
        return $this->Controller->action($action);
    }
}