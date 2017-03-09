<?php

class Model_Users extends Model {
 
 public function get_data() {
  foreach (User::find_all() as $item) {
   $this->items->addItem($item, $item->userid);
  }
  return $this->items;
 }

 public function get($userid) {
  return $this->items->getItem($userid);
 }

 public function save(User $user){
  return $user->save() ? $user : false;
 }
 
 public function changeStatus($userid) {
  return $user = $this->get($userid)->changeStatus();
 }

 public function create(array $user) {
  $user = User::add($user['login'], $user['password'], $user['username'], $user['email']);
  return $user->save() ? $user : false;
 }

 public function delete($userid) {
  return $this->items->getItem($userid)->delete();
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
