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
     * Module constructor.
     */
    public function __construct()
    {
        //$class = explode('\\', get_called_class());
        $controller = get_called_class() . '\Controller';
        $model = get_called_class() . '\Model';
        //$classs = get_called_class() . '\\' . end($class);
        $this->Controller = new $controller(new $model);
    }

    /**
     * @param $Action
     * @return mixed|void
     */
    public function addRoute(string $Action)
    {
        global $core;
        //echo get_called_class() . __METHOD__ . '<br>';
        $core->Router->setRoute( new Route(get_called_class(), $Action));
    }

    /**
     * @param $action
     * @param $query
     * @return mixed
     */
    public function action($action, Query $query)
    {
        return $this->Controller->action($action, $query);
    }
}