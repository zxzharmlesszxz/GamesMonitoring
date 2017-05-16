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
        $class = explode('\\', get_called_class());
        $controller = get_called_class() . '\Controller';
        $model = get_called_class() . '\Model';
        $classs = get_called_class() . '\\' . end($class);
        echo end($class) . '<br>';
        if (class_exists($controller))
            $this->addController(new $controller);
        if (class_exists($model))
            $this->addModel(new $model);
        //if (class_exists($classs))
        //    $this->addClass(new $classs);
    }

    /**
     * @param Model $model
     * @return mixed|void
     */
    public function addModel($model)
    {
        echo __METHOD__ . '<br>';
        $this->Controller->addModel($model);
    }

    /**
     * @param $class
     * @return mixed|void
     */
    public function addClass($class)
    {
        echo __METHOD__ . '<br>';
        $this->Controller->Model->addClass($class);
    }

    /**
     * @param $controller
     * @return mixed|void
     */
    public function addController($controller)
    {
        echo __METHOD__ . '<br>';
        $this->Controller = $controller;
    }

    /**
     * @param $action
     * @return mixed
     */
    public function action($action)
    {
        echo __METHOD__ . '<br>';
        return $this->Controller->action($action);
    }
}