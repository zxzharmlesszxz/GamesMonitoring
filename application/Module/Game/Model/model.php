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
        $template = file_get_contents(__DIR__ . '/../View/games_view.php');
        $content = "";
        foreach (Game::find_all() as $item) {
            $content .= "<tr><td>$item->fullname</td><td>$item->shortname</td><td>$item->description</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
