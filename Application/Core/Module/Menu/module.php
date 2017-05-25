<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

use Core\Core;
use Core\CoreModule;

require_once 'Controller/controller.php';
require_once 'Model/model.php';

/**
 * Class Menu
 * @package Core\Module\Menu
 */
class Menu extends CoreModule
{
    /**
     * @var Menu\Menu
     */
    protected $Menu;

    /**
     * Session constructor.
     * @param Core $core
     */
    public function __construct(Core $core)
    {
        parent::__construct($core);
        $this->Menu = new Menu\Menu();
        $this->Menu->add('main', '/', 'Main', 'Main');
        $this->Menu->add('servers', '/server', 'Servers', 'Servers');
        $this->Menu->add('contacts', '/contact', 'Contacts', 'Contacts');
        $this->Menu->add('login', '/user/login', 'Login', 'Login');
        $this->Menu->add('logout', '/user/logout', 'Logout', 'Logout');
        if ($core->Session->get('type') == 'admin') {
            $this->Menu->add('admins', '/admin', 'Admins', 'Admins');
            $this->Menu->add('users', '/user', 'Users', 'Users');
            $this->Menu->add('modes', '/mode', 'Modes', 'Modes');
            $this->Menu->add('games', '/game', 'Games', 'Games');
            $this->Menu->add('logout', '/admin/logout', 'Logout', 'Logout');
        }
    }
}

spl_autoload_register(
/**
 * @param $class
 */
    function ($class) {
        $hierarchy = explode('\\', $class);
        @include_once __DIR__ . '/Class/' . end($hierarchy) . '.php';
    });
