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
 * Interface ModuleInterface
 * @package Core\Interfaces
 */
interface ModuleInterface
{
    /**
     * ModuleInterface constructor.
     */
    public function __construct();

    /**
     * @param Model $model
     * @return mixed
     */
    public function addModel(Model $model);
}