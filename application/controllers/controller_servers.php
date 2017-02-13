<?php

/**
* Controller for Server Class
**/

class Controller_Servers extends Controller {
 protected $query;

 public function __construct() {
  parent::__construct();
  $this->model = new Model_Servers();
  $this->query = $_REQUEST;
 }

 public function action_index() {
  $this->view->generate('servers_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit() {
  $this->view->generate('server_edit.php', 'template_view.php', $this->model->get(intval($this->query['serverid'])));
 }

 public function action_create() {
  $this->view->ajax($this->model->create($this->query['server']));
 }

 public function action_delete() {
  $item = $this->model->get(intval($this->query['serverid']));
  $data = $this->model->delete(intval($item->serverid));
  $this->view->ajax($data);
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['server']));
 }

 public function action_show() {
  $items = $this->model->get_data();
  foreach ($items->keys() as $id) {
   if ($items->getItem($id)->serverid == $this->query['serverid']) {
    $data = $items->getItem($id);
   }
  }
  $this->view->generate('server_show.php', 'template_view.php', $data);
 }
}
