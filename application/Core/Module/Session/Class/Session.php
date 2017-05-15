<?php

namespace Core\Module\Session;

/**
 * Class Session
 * @package Core\Module\Session
 */
class Session
{
    /**
     * @var bool
     */
    private $logged_in = false;
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $message;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
        $this->check_message();
        $this->check_login();
    }

    /**
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->logged_in;
    }

    /**
     * @param $user
     */
    public function login($user)
    {
        if ($user) {
            $this->id = $_SESSION['id'] = $user->id;
            $this->logged_in = true;
        }
    }

    /**
     *
     */
    public function logout()
    {
        unset($_SESSION['id']);
        unset($this->id);
        $this->logged_in = false;
    }

    /**
     * @param string $msg
     * @return mixed
     */
    public function message($msg = "")
    {
        if (!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    /**
     *
     */
    private function check_login()
    {
        if (isset($_SESSION['id'])) {
            $this->id = $_SESSION['id'];
            $this->logged_in = true;
        } else {
            unset($this->id);
            $this->logged_in = false;
        }
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
