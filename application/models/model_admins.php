<?php

class Model_Admins extends Model {

 public function changeStatus($adminid) {
  return $admin = $this->get($adminid)->changeStatus();
 }

 public function update(array $item) {
  $item = array_map("trim", $item);

  if (($item['password'] == $item['repassword']) && !empty($item['password'])) {
   unset($item['repassword']);
  } else {
   unset($item['password']);
   unset($item['repassword']);
  }

  $old = $this->items->getItem($item['adminid']);
  unset($item['adminid']);

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

 public function getAjax() {
  $items = parent::getAjax()['data'];
  $result = array();
  foreach ($items as $id => $item) {
   $result[] = array(
    'adminid'=> $item->adminid,
    'login' => $item->login,
    'username' => $item->username,
    'email' => $item->email,
    'status' => $item->status
   );
  }
  return array('data' => $result);
 }

 public static function authenticate($login="", $password="") {
  $data = false;
  foreach ($this->items->keys() as $id) {
   if ($this->get($id)->login == $this->query['login'] && $this->get($id)->password == $this->query['password']) {
    $data = $this->get($id);
   }
  }
  return $data;
 }
}
