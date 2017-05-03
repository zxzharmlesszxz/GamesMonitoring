<?php

/**
 * Class Model_Users
 */
class Model_Users extends Model
{
    /**
     * @param $id
     * @return mixed
     */
    public function changeStatus($id)
    {
        return $item = $this->get($id)->changeStatus();
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

        $old = $this->items->getItem($item['userid']);
        unset($item['userid']);

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
                'userid' => $item->userid,
                'login' => $item->login,
                'username' => $item->username,
                'email' => $item->email,
                'status' => $item->status
            );
        }
        return array('data' => $result);
    }
}
