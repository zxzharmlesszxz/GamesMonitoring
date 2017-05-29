<?php

namespace Module\Game;

/**
 * Class Model
 * @package Module\Game
 */
class Model extends \Core\Model
{
    protected function ajax(array $items)
    {
        $content = array();
        foreach ($items as $item) {
            $content['data'][] = array('id' => $item->id, 'fullname' => $item->fullname, 'shortname' => $item->shortname, 'description' => $item->description);
        }
        return $content;
    }

    protected function str(array $items)
    {
        $content = "";
        foreach ($items as $item) {
            $content .= "<tr><td>$item->fullname</td><td>$item->shortname</td><td>$item->description</td></tr>\n";
        }
        return $content;
    }

    /**
     * @return array|mixed|string
     */
    public function get()
    {
        $query = func_get_arg(0)->getQuery();
        $template = file_get_contents(__DIR__ . '/../View/modes_view.php');
        if (isset($query['ajax']) and $query['ajax'] == true) {
            return $this->ajax(Game::find_all());
        } else {
            return str_replace('%content%', $this->str(Game::find_all()), $template);
        }
    }
}
