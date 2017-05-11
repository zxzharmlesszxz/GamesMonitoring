<?php

namespace Module\Cron;
use Core\Collection;
use Core\Interfaces\ControllerInterface;
use Core\Route;
use Module\Cron;

/**
 * Class Controller
 * @package Module\Cron
 */
class Controller implements ControllerInterface
{
    /**
     * @var Model
     */
    public $Model;

    /**
     * @var Collection
     */
    protected $Routes;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Model = new Cron\Model();
        $this->Routes = new Collection();
    }

    /**
     * @param $Module
     * @param $Action
     * @return mixed|void
     */
    public function addRoute($Module, $Action)
    {
        $this->Routes->addItem($Action, new Route($Module,$Action));
    }
}
