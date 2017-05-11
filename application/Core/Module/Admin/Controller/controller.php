<?php

namespace Core\Module\Admin;

/**
 * Class Controller
 * @package Core\Module\Admin
 */
class Controller extends \Core\Controller
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
}
