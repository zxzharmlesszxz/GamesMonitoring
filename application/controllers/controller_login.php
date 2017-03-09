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
  $data["login_status"] = "";
  foreach ($this->model->items->keys() as $item) {
   $row = $this->model->items->getItem($item);
   if ($row->login == $this->query['login'] && $row->password == md5($this->query['password'])) {
    $data['debug']['login'] = $this->query['login'];
    $data['debug']['password'] = $this->query['password'];
    $data['debug']['keys'] = $this->model->items->keys();
    $data["login_status"] = "access_granted";
    session_start();
    $_SESSION['login'] = $this->query['login'];
   } else {
    $data["login_status"] = "access_denied";
   }
  }
  $data['debug']['query'] = $this->query;
  $data['debug']['items'] = $this->model->get_data();
  $this->view->generate('login_login.php', 'template_view.php', $data);
 }

 public function action_index() {
  $data["login_status"] = "";
  $data['debug']['query'] = $this->query;
  $data['debug']['items'] = $this->model->get_data();
  $this->view->generate('login_view.php', 'template_view.php', $data);
 }
}
