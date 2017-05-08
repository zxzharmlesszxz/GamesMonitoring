<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

use Core\Interfaces;

require_once 'Controller/controller.php';

/**
 * Class Database
 * @package Core\Module\Database
 */
class Database implements Interfaces\ModuleInterface
{
    /**
     * @var Database\Controller
     */
    public $Controller;

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