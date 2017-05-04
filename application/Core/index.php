<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core;
require_once 'Controller/index.php';
require_once 'Model/index.php';
require_once 'Router/index.php';
require_once 'View/index.php';

/**
 * @param $class
 */
function __autoload($class)
{
    @include_once __DIR__ . "/Class/${class}.php";
}