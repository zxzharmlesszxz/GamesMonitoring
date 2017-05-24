<?php

namespace Module\Country;

/**
 * Class Model
 * @package Module\Country
 */
class Model extends \Core\Model
{
    public function get()
    {
        echo __METHOD__;
        $template = file_get_contents(__DIR__ . '/../View/countries_view.php');
        var_dump($template);
        $content = "";
        foreach (Country::find_all() as $item) {
            $content .= "<tr><td>$item->code</td><td>$item->name</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
