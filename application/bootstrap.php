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

$modulesDir = dir($core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH);

while (false !== ($module = $modulesDir->read())) {
    switch ($module) {
        case '.':
        case '..':
            break;
        default:
            //var_dump($module);
            include_once $core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH . '/' . $module . '/module.php';
            $moduleName = "Module\\$module";
            $core->registerModule($module, new $moduleName);
            break;
    }
}

$core->run();
$core->Session->set('Theme', $core->Config->THEME);
$core->Theme->generate($core->content);

//var_dump($core->Theme);
//var_dump($core->content);

include __DIR__ . '/Module/Country/Class/Country.php';
var_dump(\Module\Country\Country::find_all());

//var_dump($core->Router->getRoutes());