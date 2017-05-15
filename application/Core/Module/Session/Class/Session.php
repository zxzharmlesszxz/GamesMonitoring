<?php

namespace Core\Module\Session;
use Core\Collection;

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
     * @var Collection
     */
    public $data;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
        $this->data = new Collection();
        $this->check_message();
        $this->check_login();
        if ($this->logged_in) {
            // actions to take right away if user is logged in
        } else {
            // actions to take right away if user is not logged in
        }
    }

    /**
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->data->getItem('logged_in');
    }

    /**
     * @param $user
     */
    public function login($user)
    {
        if ($user) {
            $this->id = $_SESSION['id'] = $user->id;
            $this->data->addItem(true,'logged_in');
        }
    }

    /**
     *
     */
    public function logout()
    {
        unset($_SESSION['id']);
        $this->data->deleteItem('id');
        $this->data->deleteItem('logged_in');
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
            return $this->data->getItem('message');
        }
    }

    /**
     *
     */
    private function check_login()
    {
        if (isset($_SESSION['id'])) {
            $this->data->addItem($_SESSION['id'], 'id');
            $this->data->addItem(true,'logged_in');
        } else {
            $this->data->deleteItem('id');
            $this->data->deleteItem('logged_in');
        }
    }

    /**
     *
     */
    private function check_message()
    {
        if (isset($_SESSION['message'])) {
            $this->data->addItem($_SESSION['message'], 'message');
            unset($_SESSION['message']);
        } else {
            $this->data->deleteItem('message');
        }
    }
}
