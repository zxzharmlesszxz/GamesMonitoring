<?php

namespace Module\Cron;
use Module\Cron;

/**
 * Class Controller
 * @package Module\Cron
 */
class Controller extends \Core\Controller
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->Model = new Cron\Model();
    }

    public function action($action = 'index')
    {
        echo __CLASS__ . __METHOD__ . " doin $action<br>";
    }
}
