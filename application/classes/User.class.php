<?php

/***
* User class
***/

class User extends DatabaseObject {
 protected static $table_name = "users";
 protected static $db_fields = array('userid', 'login', 'password', 'username', 'email', 'status');

 protected $userid;
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

 public function setPassword($password) {
  $this->password = md5(trim($password));
 }

 public function changeStatus() {
  $this->status = ($this->status == 1) ? 0 : 1;
  return $this->save();
 }
}
