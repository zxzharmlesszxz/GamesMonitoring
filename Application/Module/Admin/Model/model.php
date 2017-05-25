<?php

namespace Module\Admin;

/**
 * Class Model
 * @package Module\Admin
 */
class Model extends \Core\Model
{
    public function get()
    {
        $template = file_get_contents(__DIR__ . '/../View/admins_view.php');
        $content = "";
        foreach (Admin::find_all() as $item) {
            $content .= "<tr><td>$item->login</td><td>$item->username</td><td>$item->email</td><td>$item->status</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
