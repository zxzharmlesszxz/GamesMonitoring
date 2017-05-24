<?php

namespace Module\Country;

/**
 * Class Model
 * @package Module\Country
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
        $template = file_get_contents(__DIR__ . '/../View/countries_view.php');
        $content = "";
        foreach (Country::find_all() as $item) {
            $content .= "<tr><td>$item->code</td><td>$item->name</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
