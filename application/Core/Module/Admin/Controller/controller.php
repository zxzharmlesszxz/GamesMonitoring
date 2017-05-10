<?php

namespace Core\Module\Admin;
use Core\Interfaces\ControllerInterface;

/**
 * Class Controller
 * @package Core\Module\Admin
 */
class Controller implements ControllerInterface
{
    /**
     * @var Model
     */
    public $Model;

    /**
     * @var
     */
    public $View;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Model = new Model();
    }

    /**
     * @param string $action
     * @return mixed|void
     */
    public function action($action = 'index')
    {
        $this->view->generate('games_view.php', 'template_view.php', $this->Model->get_data());
    }
}
