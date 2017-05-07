<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core;
require_once 'Interface/ControllerInterface.php';
require_once 'Interface/RouterInterface.php';
require_once 'Interface/ModuleInterface.php';
require_once 'Interface/ModelInterface.php';
require_once 'Interface/ViewInterface.php';
require_once 'Model/index.php';
require_once 'Router/index.php';
require_once 'View/index.php';

spl_autoload_register(function ($class) {
    $hierarchy = explode('\\', $class);
    @include_once __DIR__ . '/Class/' . end($hierarchy) . '.php';
});