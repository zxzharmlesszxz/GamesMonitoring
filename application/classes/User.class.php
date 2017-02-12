<?php

/***
* User class
***/

class User extends DatabaseObject {
 protected static $table_name = "users";
 protected static $db_fields = array('userid', 'login', 'password', 'username', 'email');

 public $userid;
 public $login;
 public $password;
 public $username;
 public $email;

 public static function add($login, $password, $username, $email) {
  $new = new static;
  $new->login = trim($login);
  $new->setPassword($password);
  $new->username = trim($username);
  $new->email = trim($email);
  return $new;
 }

 public function setPassword($password) {
  $this->password = md5(trim($password));
 }
}
