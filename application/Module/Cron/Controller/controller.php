<?php

namespace Module\Cron;
use Core\Collection;
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
}
