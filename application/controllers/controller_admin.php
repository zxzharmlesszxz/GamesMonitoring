<?php

/**
 * Class Controller_Admin
 */
class Controller_Admin extends Controller
{
    /**
     * Controller_Admin constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function action_index()
    {
        session_start();
        if ($_SESSION['admin'] == "12345") {
            $this->view->generate('admin_view.php', 'template_view.php');
        } else {
            session_destroy();
        }
    }

    /**
     *
     */
    public static function action_logout()
    {
        session_start();
        session_destroy();
        header('Location: "/"');
    }
}
