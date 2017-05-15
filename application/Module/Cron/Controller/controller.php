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

    /**
     * @return mixed|string
     */
    protected function index()
    {
        echo __METHOD__ . " working<br>";
        return $this->Model->get();
    }
}
