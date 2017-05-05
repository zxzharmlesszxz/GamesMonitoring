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
 * Class Contacts
 * @package Module
 */
class Contacts implements Interfaces\ModuleInterface
{
    /**
     * @var Contacts\Controller
     */
    public $Controller;

    /**
     * Contacts constructor.
     */
    public function __construct()
    {
        $this->Controller = new Contacts\Controller();
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