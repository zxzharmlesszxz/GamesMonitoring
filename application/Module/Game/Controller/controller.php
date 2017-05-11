<?php

namespace Module\Game;

use Module\Game;

/**
 * Class Controller
 * @package Module\Game
 */
class Controller extends \Core\Controller
{
    /**
     * @var
     */
    public $View;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->Model = new Game\Model();
    }
}
