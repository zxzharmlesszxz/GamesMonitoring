<?php

class Model_Users extends Model {
 public function __construct() {
  parent::__construct();
  foreach (User::find_all() as $item) {
   $this->items->addItem($item, $item->userid);
  }
 }
 
 public function changeStatus($id) {
  return $item = $this->get($id)->changeStatus();
 }

 public function update(array $user) {
  foreach ($user as $key => $value) {
   $user[$key] = trim($value);
  }
  if (($user['password'] == $user['repassword']) && !empty($user['password'])) {
   unset($user['repassword']);
  } else {
   unset($user['password']);
   unset($user['repassword']);
  }
  $u = $this->items->getItem($user['userid']);
  unset($user['userid']);
  if (!$u) {
   return FALSE;
  }
  foreach ($user as $key => $value) {
   $u->$key = $value;
   if ($key == 'password') {
    $u->setPassword($u->password);
   }
  }
  return $u->save() ? $u : false;
 }
}
