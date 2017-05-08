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
 * Class Cron
 * @package Module
 */
class Cron implements Interfaces\ModuleInterface
{
    /**
     * @var Cron\Controller
     */
    public $Controller;

    /**
     * Cron constructor.
     */
    public function __construct()
    {
        $this->Controller = new Cron\Controller();
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