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
        echo end($class) . "<br>";
        $this->Controller = new $controller();
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