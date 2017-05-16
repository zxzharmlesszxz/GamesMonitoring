<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 05.05.17
 * Time: 12:44
 */

namespace Core\Interfaces;

use Core\Model;

/**
 * Interface ControllerInterface
 * @package Core\Interfaces
 */
interface ControllerInterface
{
    /**
     * ControllerInterface constructor.
     * @param Model $model
     */
    public function __construct(Model $model);

    /**
     * @param $Module
     * @param $Action
     * @return mixed
     */
    public function addRoute($Module, $Action);

    /**
     * @param ModelInterface|Model $model
     * @return mixed
     */
    public function addModel($model);
}
