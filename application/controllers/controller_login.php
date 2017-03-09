<?php

class Controller_Login extends Controller{
 protected $query;

 public function __construct() {
  parent::__construct();
  include_once(config()->MODELS_PATH.'/model_admins.php');
  $this->model = new Model_Admins();
  $this->query = $_REQUEST;
 }

 public function action_login() {

  if ($this->model->items->keyExists($this->query['login'])) {

   $data["login_status"] = "access_granted";
   session_start();
   $_SESSION['admin'] = $password;
  } else {
   $data["login_status"] = "access_denied";
  }
  $this->view->generate('login_login.php', 'template_view.php', $data);
 }

 public function action_index() {
  $data["login_status"] = "";
  $data['debug']['query'] = $this->query;
  $data['debug']['model'] = $this->model;
  $data['debug']['items'] = $this->model->items;
  $this->view->generate('login_view.php', 'template_view.php', $data);
 }
}
