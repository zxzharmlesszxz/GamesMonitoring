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

    public function login()
    {
        $query = func_get_arg(0)->getQuery();
        $content = "";
        if (!empty($query) && isset($query['login']) && isset($query['password'])) {
            $user = User::find_by_scope(array('login' => $query['login'], 'password' => md5($query['password'])));
        }
        if ($user) {
            // Try to authentificate user
        } else {
            // Output error and display login form
        }
        $template = file_get_contents(__DIR__ . '/../View/user_login.php');
        $content .= serialize($query);
        $content .= serialize($user);
        return str_replace('%content%', $content, $template);
    }

    public function logout()
    {

    }
}
