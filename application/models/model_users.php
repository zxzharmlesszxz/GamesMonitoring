<?php

class Model_Users extends Model {
 public function changeStatus($id) {
  return $item = $this->get($id)->changeStatus();
 }

 public function update(array $item) {
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
   $old->$key = $value;
   if ($key == 'password') {
    $old->setPassword($old->password);
   }
  }
  return $old->save() ? $old : false;
 }
}
