<?php

require_once __DIR__.'/../../application/core/model.php';
require_once __DIR__.'/../../application/core/view.php';
require_once __DIR__.'/../../application/core/controller.php';
require_once 'application/core/route.php';
require_once __DIR__.'/../../application/includes/functions.inc.php';

$config = Config::getInstance();
Registry::_set('config', $config);
$database = new MySQL_Database;
Registry::_set('database', $database);

function __autoload($class){
 @include_once __DIR__."/../../application/classes/${class}.class.php";
}

function config(){
 return Registry::_get('config');
}

function db(){
 return Registry::_get('database');
}

Route::start();
