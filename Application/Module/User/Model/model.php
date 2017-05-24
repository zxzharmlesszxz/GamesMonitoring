<?php

namespace Module\User;

/**
 * Class Model
 * @package Module\User
 */
class Model extends \Core\Model
{
    public function get()
    {
        $template = file_get_contents(__DIR__ . '/../View/users_view.php');
        $content = "";
        foreach (User::find_all() as $item) {
            $content .= "<tr><td>$item->login</td><td>$item->username</td><td>$item->email</td><td>$item->status</td></tr>\n";
        }
        return str_replace('%content%', $content, $template);
    }
}
