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
    public $Model;
    public $View;
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Model = new Cron\Model();
    }

    /**
     * @param string $action
     * @return mixed|void
     */
    public function action($action = 'index')
    {
        $this->view->generate('cron_view.php', 'cron_template.php', $this->Model->get_data());
    }
}
