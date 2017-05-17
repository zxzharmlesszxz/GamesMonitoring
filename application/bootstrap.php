<?php

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';

/**
 * @param $class
 */
function __autoload($class)
{
    @include_once __DIR__ . "/classes/${class}.class.php";
}

$core = Core\Core::getInstance();

$modulesDir = dir(\Core\Core::$Config->PROJECT_ROOT . '/' . \Core\Core::$Config->MODULE_PATH);

while (false !== ($module = $modulesDir->read())) {
    switch ($module) {
        case '.':
        case '..':
            break;
        default:
            include_once \Core\Core::$Config->PROJECT_ROOT . '/' . \Core\Core::$Config->MODULE_PATH . '/' . $module . '/module.php';
            $moduleName = "Module\\$module";
            $core->registerModule($module, new $moduleName);
            \Core\Core::$Router->setRoute(new \Core\Route($moduleName, 'index'));
            break;
    }
}

\Core\Core::$Session->set('Theme', $core->Config->THEME);
\Core\Core::$Router->startRouting();
