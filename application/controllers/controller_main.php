<?php

class Controller_Main extends Controller{

 public function __construct() {
  parent::__construct();
 }

 public function action_index(){
  $this->view->generate('main_view.php', 'template_view.php');
 }
}
