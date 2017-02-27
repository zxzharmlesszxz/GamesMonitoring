<?php

require_once '../private/core/model.php';
require_once '../private/core/view.php';
require_once '../private/core/controller.php';
require_once '../private/core/route.php';
require_once '../private/includes/functions.inc.php';

$config = Config::getInstance();
Registry::_set('config', $config);
$database = new MySQL_Database;
Registry::_set('database', $database);

function __autoload($class){
 @include_once __DIR__."/../private/classes/${class}.class.php";
}

function config(){
 return Registry::_get('config');
}

function db(){
 return Registry::_get('database');
}

Route::start();
