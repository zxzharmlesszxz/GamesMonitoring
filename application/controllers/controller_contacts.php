<?php

class Controller_Contacts extends Controller{

 public function __construct() {
  parent::__construct();
 }

 public function action_index(){
  $this->view->generate('contacts_view.php', 'template_view.php');
 }
}
