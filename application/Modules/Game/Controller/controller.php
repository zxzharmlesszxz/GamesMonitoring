<?php

namespace Module\Game;
use Core\Interfaces\ControllerInterface;
use Module\Game;

/**
 * Class Controller
 * @package Module\Game
 */
class Controller implements ControllerInterface
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
        $this->Model = new Game\Model();
    }

    /**
     * @param string $action
     * @return mixed|void
     */
    public function action($action = 'index')
    {
        $this->view->generate('games_view.php', 'template_view.php', $this->Model->get_data());
    }
}
