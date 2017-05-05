<?php

namespace Module\Error;

/**
 * Class Controller_404
 */
class Controller_404 extends Controller
{
    /**
     *
     */
    public function action_index()
    {
        $this->view->generate('module.php', 'template_view.php', "Module/Method doesn't exists");
    }
}
