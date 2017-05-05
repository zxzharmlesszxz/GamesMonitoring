<?php

namespace Module\Error;
use Core\Controller as ControllerInterface;

/**
 * Class Controller
 */
class Controller implements ControllerInterface
{
    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('module.php', 'template_view.php', "ModuleInterface/Method doesn't exists");
    }
}
