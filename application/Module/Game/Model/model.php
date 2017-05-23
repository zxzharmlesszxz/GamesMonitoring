<?php

namespace Module\Game;

/**
 * Class Model
 * @package Module\Game
 */
class Model extends \Core\Model
{
    protected $class;

    public function __construct()
    {
        parent::__construct();
        //$this->class = new Game();
    }

    public function get()
    {
        return serialize(Game::find_all());
    }
}
