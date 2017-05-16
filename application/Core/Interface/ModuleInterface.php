<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 12:44
 */

namespace Core\Interfaces;

/**
 * Interface ModuleInterface
 * @package Core\Interfaces
 */
interface ModuleInterface
{
    /**
     * @param $model
     * @return mixed
     */
    public function addModel($model);

    /**
     * @param $class
     * @return mixed
     */
    public function addClass($class);

    /**
     * @param $controller
     * @return mixed
     */
    public function addController($controller);
}