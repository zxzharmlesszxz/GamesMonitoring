<?php

namespace Module\Error;
use Core\Interfaces;

/**
 * Class Controller
 */
class Controller implements Interfaces\ControllerInterface
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param string $action
     * @return mixed|void
     */
    public function action($action = 'index')
    {
        $this->view->generate('module.php', 'template_view.php', "ModuleInterface/Method doesn't exists");
    }
}
