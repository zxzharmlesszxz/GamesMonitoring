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

 public static function add($login, $password, $username, $email) {
  $new = new static;
  $new->login = trim($login);
  $new->setPassword($password);
  $new->username = trim($username);
  $new->email = trim($email);
  $new->status = 0;
  return $new;
 }

 public function setPassword($password) {
  $this->password = md5(trim($password));
 }
}
