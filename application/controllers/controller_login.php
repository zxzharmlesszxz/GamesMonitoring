<?php

class Controller_Login extends Controller{
 protected $query;

 public function __construct() {
  parent::__construct();
  include_once(config()->MODELS_PATH.'/model_admins.php');
  $this->model = new Model_Admins();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $data["login_status"] = "";
  if ($login=="admin" && $password=="12345"){
   $data["login_status"] = "access_granted";
   session_start();
   echo $_SESSION['admin'];
   $_SESSION['admin'] = $password;
   header('Location: /admin/');
  } else {
   $data["login_status"] = "access_denied";
  }

  $data['debug']['query'] = $this->query;
  $data['debug']['model'] = $this->model;

  $this->view->generate('login_view.php', 'template_view.php', $data);
 }
}
