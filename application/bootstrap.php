<?php

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';
$core = Core\Core::getInstance();

#Registry::_set('database', new MySQL_Database);

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

var_dump($core);
var_dump($core->CoreModules);
var_dump($core->getCoreModule('Error'));
var_dump($core->Modules);
var_dump($core->getModule('Admin'));
var_dump(config());

/**
 * @param $class
 */
function __autoload($class)
{
    @include_once __DIR__ . "/classes/${class}.class.php";
}

/**
 * @return mixed|null
 */
function config()
{
    global $core;
    return $core->Config;
}

/**
 * @return mixed|null
 */
function db()
{
    global $core;
    return $core->getCoreModule('Database');
}

/**
 * @return mixed|null
 */
function session()
{
    global $core;
    return $core->getCoreModule('Session');
}

Core\Router::start();
