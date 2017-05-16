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
     */
    public function __construct();

    /**
     * @param $Module
     * @param $Action
     * @return mixed
     */
    public function addRoute($Module, $Action);

    /**
     * @param Model $model
     * @return mixed
     */
    public function addModel(Model $model);
}
