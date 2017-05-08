<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module\Error;

use Core\Interfaces;

require_once 'Controller/controller.php';

/**
 * Class Error
 * @package Core\Module\Error
 */
class Error implements Interfaces\ModuleInterface
{
    /**
     * @var Controller
     */
    public $Controller;

    /**
     * Error constructor.
     */
    public function __construct()
    {
        $this->Controller = new Controller();
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