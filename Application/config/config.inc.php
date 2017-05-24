<?php

/**
* Games Monitoring Project Configuration file
**/

$config = array(

 'PROJECT_NAME' => 'Games Monitoring',
 'PROJECT_VERSION' => '0.0.2',
 'PROJECT_ROOT' => dirname(__DIR__, 2),
 'DEFAULT_THEME' => 'Example',
 'CLASS_PATH' => 'application/classes',
 'INCLUDES_PATH' => 'application/includes',
 'MODULE_PATH' => 'application/Module',
 'CORE_PATH' => 'application/Core',
 'CORE_MODULE_PATH' => 'application/Core/Module',

 'mysql' => array(
  'host' => 'localhost',
  'database' => 'gamesmonitoring',
  'user' => 'gamesmonitoring',
  'password' => 'gamesmonitoring',
  'charset' => 'utf8',
  ),
);