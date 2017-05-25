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

    public function login()
    {
        $query = func_get_arg(0)->getQuery();
        $content = "";
        if (!empty($query) && isset($query['login']) && isset($query['password'])) {
            $user = Admin::find_by_scope(array('login' => $query['login'], 'password' => md5($query['password'])))[0];
        }
        if (isset($user)) {
            // Try to authentificate user
            $content = $user->login;
            $template = "<b>Welcome %content%.</b>";
        } else {
            // Output error and display login form
            $template = file_get_contents(__DIR__ . '/../View/admin_login.php');
        }
        return str_replace('%content%', $content, $template);
    }

    public function logout()
    {

    }
}
