<?php

namespace Module\User;

use Core\Core;

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
        $session = Core::getInstance()->Session;
        $query = func_get_arg(0)->getQuery();
        $content = "";
        if (!empty($query) && isset($query['login']) && isset($query['password'])) {
            $user = User::find_by_scope(array('login' => $query['login'], 'password' => md5($query['password'])))[0];
        }
        if (isset($user)) {
            // Try to authentificate user
            $content = $user->login;
            $template = "<b>Welcome %content%.</b>";
            $session->login();
        } else {
            // Output error and display login form
            $template = file_get_contents(__DIR__ . '/../View/user_login.php');
        }
        $content .= serialize($session);
        $content .= serialize($_SESSION);
        return str_replace('%content%', $content, $template);
    }

    public function logout()
    {

    }
}
