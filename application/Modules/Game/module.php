<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Module;

use Core\Interfaces;

require_once 'Controller/controller.php';
require_once 'Model/model.php';

/**
 * Class Game
 * @package Module
 */
class Game implements Interfaces\ModuleInterface
{
    /**
     * @var Game\Controller
     */
    public $Controller;

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->Controller = new Game\Controller();
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