<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 04.05.17
 * Time: 17:37
 */

namespace Core\Module;

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
     * @var Session\Session
     */
    public $Session;

    /**
     * @var
     */
    public $message;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->Session = new Session\Session();
    }

    /**
     * @param string $msg
     */
    public function message($msg = '')
    {
        $this->Session->set('message', $msg);
    }

    /**
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->Session->get('logged_in');
    }

    /**
     *
     */
    public function check_login()
    {
        return $this->Session->get('logged_in');
    }

    /**
     *
     */
    public function check_message()
    {
        $message = $this->Session->get('message');
        if ($message)
            $this->message = $message;
        $this->Session->set('message', '');
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->Session->set($key, $value);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->Session->get($key);
    }

    /**
     *
     */
    public function login()
    {
        $this->Session->set('logged_in', true);
    }

    /**
     *
     */
    public function logout()
    {
        $this->Session->set('logged_in', false);
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
