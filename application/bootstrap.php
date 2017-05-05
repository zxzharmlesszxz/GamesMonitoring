<?php

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';

Core\Registry::_set('config', Core\Config::getInstance());
#Registry::_set('database', new MySQL_Database);
#Registry::_set('session', new Session);

$core = Core\Core::getInstance();
$modulesDir = dir($core->Config->PROJECT_ROOT . '/' . $core->Config->MODULES_PATH);
while (false !== ($module = $modulesDir->read()))
{
    switch ($module) {
        case '.':
        case '..':
            break;
        default:
            $core->Modules->addItem(new $module);
    }
}

var_dump($core);

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
