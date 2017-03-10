<?php

/**
* Controller for Modes Class
**/

class Controller_Modes extends Controller {
 protected $query;

 public function __construct() {
  parent::__construct();
 }

 public function action_index() {
  $this->view->generate('modes_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit() {
  $this->view->generate('mode_edit.php', 'template_view.php', $this->model->get(intval($this->query['modeid'])));
 }

 public function action_create() {
  $this->view->ajax($this->model->create($this->query['mode']));
 }

 public function action_delete() {
  $item = $this->model->get(intval($this->query['modeid']));
  $data = $this->model->delete(intval($item->modeid));
  $this->view->ajax($data);
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['mode']));
 }

 public function action_show() {
  $items = $this->model->get_data();
  foreach ($items->keys() as $id) {
   if ($items->getItem($id)->modeid == $this->query['modeid']) {
    $data = $items->getItem($id);
   }
  }
  $this->view->generate('mode_show.php', 'template_view.php', $data);
 }

 public function action_getAll() {
  $this->view->ajax($this->model->getAjax());
 }
}
