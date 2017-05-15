<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

use Core\Collection;
use Core\Module;

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
    protected $Controller;

    /**
     * @var Session\Session
     */
    public $Session;

    public $Data;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->Session = new Session\Session();
        $this->Controller = new Session\Controller();
        $this->Data = new Collection();
    }

    public function message($msg = '')
    {
        $this->Session->message($msg);
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
