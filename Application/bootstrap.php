<?php

namespace Core;

require_once 'Core/index.php';
require_once 'includes/functions.inc.php';

/**
 * @param $class
 */
function __autoload($class)
{
    @include_once __DIR__ . "/classes/${class}.class.php";
}

$core = Core::getInstance();

$modulesDir = dir($core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH);

while (false !== ($module = $modulesDir->read())) {
    switch ($module) {
        case '.':
        case '..':
            break;
        default:
            //var_dump($module);
            include_once $core->Config->PROJECT_ROOT . '/' . $core->Config->MODULE_PATH . '/' . $module . '/module.php';
            $moduleName = "Module\\$module";
            $core->registerModule($module, new $moduleName);
            break;
    }
}

$core->run();
$core->Session->set('Theme', $core->Config->THEME);
$menu = $core->getCoreModule('Menu');

$menu->add('main', '/', 'Main', 'Main');
$menu->add('servers', '/server', 'Servers', 'Servers');
$menu->add('contacts', '/contact', 'Contacts', 'Contacts');
$menu->add('login', '/user/login', 'Login', 'Login');
$menu->add('logout', '/user/logout', 'Logout', 'Logout');
if ($core->Session->get('type') == 'admin') {
    $menu->add('admins', '/admin', 'Admins', 'Admins');
    $menu->add('users', '/user', 'Users', 'Users');
    $menu->add('modes', '/mode', 'Modes', 'Modes');
    $menu->add('games', '/game', 'Games', 'Games');
    $menu->add('logout', '/admin/logout', 'Logout', 'Logout');
}
$core->Theme->generate($core->content);
var_dump($menu);
//var_dump($core->Theme);
//var_dump($core->content);
//var_dump($core->Router->getRoutes());