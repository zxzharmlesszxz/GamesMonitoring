<?php

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';

Registry::_set('config', Config::getInstance());
Registry::_set('database', new MySQL_Database);
Registry::_set('session', new Session);

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
