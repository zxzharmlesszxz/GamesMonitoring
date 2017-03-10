<?php

/***
* Admin class
***/

class Admin extends DatabaseObject {
 protected static $table_name = "admins";
 protected static $db_fields = array('adminid', 'login', 'password', 'username', 'email', 'status');

 protected $adminid;
 protected $password;
 protected $status;
 public $login;
 public $username;
 public $email;

 public static function add(array $item) {
  $new = new static;
  $new->login = trim($item['login']);
  $new->setPassword($item['password']);
  $new->username = trim($item['username']);
  $new->email = trim($item['email']);
  $new->status = 0;
  return $new;
 }

 public function changeStatus() {
  $this->status = ($this->status == 1) ? 0 : 1;
  return $this->save();
 }

 public function setPassword($password) {
  $this->password = md5(trim($password));
 }
}
