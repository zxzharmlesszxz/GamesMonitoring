<?php

class Controller_Login extends Controller{
 protected $query;

 public function __construct() {
  parent::__construct();
  include_once(config()->MODELS_PATH.'/model_admins.php');
  $this->model = new Model_Admins();
 }

 public function action_login() {
  $data["login_status"] = "";
  foreach ($this->model->get_data()->keys() as $item) {
   $row = $this->model->get($item);
   if ($row->login == $this->query['login'] && $row->password == md5($this->query['password'])) {
    $data["login_status"] = "access_granted";
    $_SESSION['login'] = $this->query['login'];
   } else {
    $data["login_status"] = "access_denied";
   }
  }
  $this->view->generate('login_login.php', 'template_view.php', $data);
 }

 public function action_logout() {
   $data["login_status"] = "";
   $this->view->generate('login_logout.php', 'template_view.php');
  }

 public function action_index() {
  $data["login_status"] = "";
  $this->view->generate('login_view.php', 'template_view.php', $data);
 }
}
