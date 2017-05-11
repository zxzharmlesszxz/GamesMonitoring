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
 * Class Session
 * @package Core\Module\Session
 */
class Session extends Module
{
    /**
     * @var Session\Controller
     */
    private $Controller;

    /**
     * @var Session\Session
     */
    public $Session;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->Session = new Session\Session();
        $this->Controller = new Session\Controller();
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
