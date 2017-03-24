<?php

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'includes/functions.inc.php';

Registry::_set('config', Config::getInstance());
Registry::_set('database', new MySQL_Database);
Registry::_set('session', new Session);

function __autoload($class){
 @include_once __DIR__."/classes/${class}.class.php";
}

function config(){
 return Registry::_get('config');
}

function db(){
 return Registry::_get('database');
}

function session() {
 return Registry::_get('session');
}

Route::start();
