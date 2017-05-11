<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

use \Module;

require_once 'Controller/controller.php';
require_once 'Model/model.php';

/**
 * Class User
 * @package Module
 */
class User extends Module
{
    /**
     * @var User\Controller
     */
    private $Controller;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->Controller = new User\Controller();
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