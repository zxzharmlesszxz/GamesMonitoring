<?php

/**
 * Class Controller_Contacts
 */
class Controller_Contacts extends Controller
{

    /**
     * Controller_Contacts constructor.
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
        $this->view->generate('view.php', 'template_view.php');
    }
}
