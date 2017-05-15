<?php

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';
$core = Core\Core::getInstance();

$modulesDir = dir($core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH);
while (false !== ($module = $modulesDir->read())) {
    switch ($module) {
        case '.':
        case '..':
            break;
        default:
            include_once $core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH . '/' . $module . '/module.php';
            $moduleName = "Module\\$module";
            $core->registerModule($module, new $moduleName);
            $core->Router->setRoute(new \Core\Route($moduleName, 'index'));
            break;
    }
}

/**
 * @param $class
 */
function __autoload($class)
{
    @include_once __DIR__ . "/classes/${class}.class.php";
}

$core->Session->set('Theme', $core->Config->THEME);

//print_r($core->Router);
$core->Router->startRouting();

//var_dump($_SESSION);
