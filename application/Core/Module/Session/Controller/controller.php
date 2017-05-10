<?php

namespace Core\Module\Session;

use Core\Interfaces;

/**
 * Class Controller
 * @package Core\Module\Session
 */
class Controller implements Interfaces\ControllerInterface
{
    /**
     * @var Model
     */
    public $Model;

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

    }
}
