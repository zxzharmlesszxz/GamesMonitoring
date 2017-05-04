<?php

require_once __DIR__ . '/core/model.php';
require_once __DIR__ . '/core/view.php';
require_once __DIR__ . '/core/controller.php';
require_once __DIR__ . '/core/route.php';
require_once __DIR__ . '/includes/functions.inc.php';

Registry::_set('config', Config::getInstance());
Registry::_set('database', new MySQL_Database);
Registry::_set('session', new Session);
$dir = explode('/', getcwd());
Registry::_set('dir', array_pop($dir));

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
 return Registry::_get('config');
}

/**
 * @return mixed|null
 */
function db(){
 return Registry::_get('database');
}

/**
 * @return mixed|null
 */
function session() {
 return Registry::_get('session');
}

Route::start();
