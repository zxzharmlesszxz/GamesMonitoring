<?php

namespace Module\Cron;
use Core\Interfaces\ControllerInterface;
use Module\Cron;

/**
 * Class Controller
 * @package Module\Cron
 */
class Controller implements ControllerInterface
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->model = new Model();
    }

    /**
     * @param string $action
     * @return mixed|void
     */
    public function action($action = 'index')
    {
        $this->view->generate('cron_view.php', 'cron_template.php', $this->model->get_data());
    }
}
