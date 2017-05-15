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

$core->Session->message('test');
$core->Session->set('Theme', $core->Theme);

$core->Session->login();

var_dump($core->Session);

var_dump($core->Session->check_login());

var_dump($core->Router);
var_dump($core->Modules);
