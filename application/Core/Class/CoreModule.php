<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 11:14
 */

namespace Core;

use Core\Interfaces\CoreModuleInterface;

/**
 * Class CoreModule
 * @package Core
 */
abstract class CoreModule implements CoreModuleInterface
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
     * @param $action
     * @return mixed
     */
    public function action($action)
    {
        return $this->Controller->action($action);
    }
}