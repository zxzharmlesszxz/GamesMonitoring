<?php

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';
$core = Core\Core::getInstance();

#Registry::_set('database', new MySQL_Database);

$modulesDir = dir($core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH);
while (false !== ($module = $modulesDir->read()))
{
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
function config(){
 return Core\Registry::_get('config');
}

/**
 * @return mixed|null
 */
function db(){
 return Core\Registry::_get('database');
}

/**
 * @return mixed|null
 */
function session() {
 return Core\Registry::_get('session');
}

Core\Router::start();
