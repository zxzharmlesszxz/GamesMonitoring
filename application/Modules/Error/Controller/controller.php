<?php

namespace Module\Error;
use Core;

/**
 * Class Controller
 */
class Controller extends Core\Controller
{
    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('module.php', 'template_view.php', "Module/Method doesn't exists");
    }
}
