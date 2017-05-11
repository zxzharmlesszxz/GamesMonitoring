<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 11.05.17
 * Time: 10:42
 */

namespace Core;

/**
 * Class Route
 * @package Core
 */
abstract class Route
{
    /**
     * @var
     */
    public $Module;

    /**
     * @var
     */
    public $Action;

    /**
     * @var
     */
    public $Query;
}