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

    /**
     * @var Collection
     */
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

    /**
     * @param string $msg
     */
    public function message($msg = '')
    {
        $this->Session->message($msg);
    }

    /**
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->logged_in;
    }

    /**
     *
     */
    private function check_login()
    {
        return (isset($_SESSION['id'])) ? true : false;
    }

    /**
     *
     */
    private function check_message()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
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
