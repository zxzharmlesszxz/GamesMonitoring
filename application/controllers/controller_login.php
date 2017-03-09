<?php

class Controller_Login extends Controller{
 protected $query;

 public function __construct() {
  parent::__construct();
  $this->model = new Model_Admins();
  $this->query = $_REQUEST;
 }

 public function action_index(){
   if ($login=="admin" && $password=="12345"){
    $data["login_status"] = "access_granted";
    session_start();
    echo $_SESSION['admin'];
    $_SESSION['admin'] = $password;
    header('Location: /admin/');
   } else {
    $data["login_status"] = "access_denied";
   }
  } else {
   $data["login_status"] = "";
  }

  $data['debug']['query'] = $this->query;
  $data['debug']['model'] = $this->model;

  $this->view->generate('login_view.php', 'template_view.php', $data);
 }
}
