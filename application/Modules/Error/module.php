<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Module;
use Core;
require_once 'Controller/controller.php';

class Error implements Core\Module
{
    public $Controller;

    public function __construct()
    {
        $this->Controller = new Controller();
    }
}

spl_autoload_register(function ($class) {
    $hierarchy = explode('\\', $class);
    @include_once __DIR__ . '/Class/' . end($hierarchy) . '.php';
});