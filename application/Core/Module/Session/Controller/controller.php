<?php

namespace Core\Module\Session;

/**
 * Class Controller
 * @package Core\Module\Session
 */
class Controller extends \Core\Controller
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
}
