<?php

/**
 * Class Controller_cron
 */
class Controller_cron extends Controller
{
    /**
     * Controller_cron constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Cron();
    }

    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('cron_view.php', 'cron_template.php', $this->model->get_data());
    }
}
