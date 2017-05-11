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

/**
 * Class Database
 * @package Core\Module\Database
 */
class Database extends Module
{
    /**
     * @var Database\Controller
     */
    private $Controller;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->Controller = new Database\Controller();
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