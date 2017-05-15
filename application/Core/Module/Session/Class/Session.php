<?php

namespace Core\Module\Session;

/**
 * Class Session
 * @package Core\Module\Session
 */
class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * @param $key
     * @return null|mixed
     */
    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return true;
    }

    /**
     * @param $key
     */
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
}
