<?php

namespace Module\Mode;

/**
 * Class Model
 * @package Module\Mode
 */
class Model extends \Core\Model
{
    public function get()
    {
        $template = file_get_contents(__DIR__ . '/../View/modes_view.php');
        $content = "";
        foreach (Mode::find_all() as $item) {
            $content .= "<tr><td>$item->fullname</td><td>$item->shortname</td><td>$item->description</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
