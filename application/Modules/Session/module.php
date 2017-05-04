<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core;
require_once 'Controller/module.php';
require_once 'Model/module.php';
require_once 'Router/module.php';
require_once 'View/module.php';


spl_autoload_register(function ($class) {
    @include_once __DIR__ . "/Class/${class}.php";
});