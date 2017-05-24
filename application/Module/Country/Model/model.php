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
        var_dump(Country::find_all());
        $template = file_get_contents(__DIR__ . '/../View/countries_view.php');
        $content = "";
        foreach (Country::find_all() as $item) {
            $content .= "<tr><td>$item->code</td><td>$item->name</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
