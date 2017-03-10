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
}
