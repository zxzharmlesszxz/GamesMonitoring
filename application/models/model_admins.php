<?php

class Model_Admins extends Model {
 public function __construct() {
  parent::__construct();
  foreach (Admin::find_all() as $item) {
   $this->items->addItem($item, $item->adminid);
  }
 }

 public function get_data() {
  return $this->items;
 }

 public function get($adminid) {
  return $this->items->getItem($adminid);
 }

 public function save(Admin $admin){
  return $admin->save() ? $admin : false;
 }
 
 public function changeStatus($adminid) {
  return $admin = $this->get($adminid)->changeStatus();
 }

 public function create(array $admin) {
  $new = Admin::add($admin);
  return $new->save() ? $new : false;
 }

 public function delete($adminid) {
  return $this->items->getItem($adminid)->delete();
 }

 public function update(array $admin) {
  foreach ($admin as $key => $value) {
   $admin[$key] = trim($value);
  }
  if (($admin['password'] == $admin['repassword']) && !empty($admin['password'])) {
   unset($admin['repassword']);
  } else {
   unset($admin['password']);
   unset($admin['repassword']);
  }
  $u = $this->items->getItem($admin['adminid']);
  if (!$u) {
   return FALSE;
  }
  foreach ($admin as $key => $value) {
   $u->$key = $value;
   if ($key == 'password') {
    $u->setPassword($u->password);
   }
  }
  return $u->save() ? $u : false;
 }
}
