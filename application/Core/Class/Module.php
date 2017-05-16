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
        $controller = get_called_class() . "\Controller";
        $model = get_called_class() . "\Model";
        echo end($class) . "<br>";
        if (class_exists($model))
            var_dump($model);
            var_dump(class_exists($model));
            $this->addModel(new $model());
        $this->Controller = new $controller();
    }

    /**
     * @param Model $model
     * @return mixed|void
     */
    public function addModel(Model $model)
    {
        $this->Controller->addModel($model);
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