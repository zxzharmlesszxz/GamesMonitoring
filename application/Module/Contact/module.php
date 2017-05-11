<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Module;

use Core\Module;

require_once 'Controller/controller.php';

/**
 * Class Contact
 * @package Module
 */
class Contact extends Module
{
    /**
     * @var Contact\Controller
     */
    protected $Controller;

    /**
     * Contacts constructor.
     */
    public function __construct()
    {
        $this->Controller = new Contact\Controller();
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