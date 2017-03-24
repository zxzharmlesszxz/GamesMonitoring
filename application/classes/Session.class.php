<?php

class Session {
 private $logged_in=false;
 public $userid;
 public $message;

 public function __construct() {
  session_start();
  $this->check_message();
  $this->check_login();
  if ($this->logged_in) {
   // actions to take right away if user is logged in
  } else {
   // actions to take right away if user is not logged in
  }
 }

 public function is_logged_in() {
  return $this->logged_in;
 }

 public function login($user) {
  if ($user){
   $this->{$user->id()} = $_SESSION[$user->id()] = $user->($user->id());
   $this->logged_in = true;
  }
 }

 public function logout() {
  unset($_SESSION['userid']);
  unset($this->userid);
  $this->logged_in = false;
 }

 public function message($msg="") {
  if (!empty($msg)) {
   $_SESSION['message'] = $msg;
  } else {
   return $this->message;
  }
 }

 private function check_login() {
  if (isset($_SESSION['userid'])) {
   $this->userid = $_SESSION['userid'];
   $this->logged_in = true;
  } else {
   unset($this->userid);
   $this->logged_in = false;
  }
 }

 private function check_message() {
  if (isset($_SESSION['message'])) {
   $this->message = $_SESSION['message'];
   unset($_SESSION['message']);
  } else {
   $this->message = "";
  }
 }
}
