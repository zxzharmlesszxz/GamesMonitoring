<?php

namespace Module\Admin;
use Core\Model;

/**
 * Class Model_Admins
 */
class Model_Admins extends Model
{

    /**
     * @param $id
     * @return mixed
     */
    public function changeStatus($id)
    {
        return $admin = $this->get($id)->changeStatus();
    }

    /**
     * @param array $item
     * @return bool|mixed
     */
    public function update(array $item)
    {
        $item = array_map("trim", $item);

        if (($item['password'] == $item['repassword']) && !empty($item['password'])) {
            unset($item['repassword']);
        } else {
            unset($item['password']);
            unset($item['repassword']);
        }

        $old = $this->items->getItem($item['id']);
        unset($item['id']);

        if (!$old) {
            return FALSE;
        }

        foreach ($item as $key => $value) {
            if ($key == 'password') {
                $old->setPassword($old->password);
            } else {
                $old->$key = $value;
            }
        }
        return $old->save() ? $old : false;
    }

    /**
     * @return array
     */
    public function getAjax()
    {
        $items = parent::getAjax()['data'];
        $result = array();
        foreach ($items as $id => $item) {
            $result[] = array(
                'id' => $item->id,
                'login' => $item->login,
                'username' => $item->username,
                'email' => $item->email,
                'status' => $item->status
            );
        }
        return array('data' => $result);
    }

    /**
     * @param string $login
     * @param string $password
     * @return bool|mixed
     */
    public function authenticate($login = "", $password = "")
    {
        $data = false;
        foreach ($this->items->keys() as $id) {
            if ($this->get($id)->login == $login && $this->get($id)->password == $password) {
                session()->login($this->get($id));
                $data = $this->get($id);
            }
        }
        return $data;
    }
}
