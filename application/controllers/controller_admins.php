<?php

/**
* Controller for Admin Class
**/

class Controller_Admins extends Controller {
 public function action_index() {
  $this->view->generate('admins_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit() {
  $this->view->generate('admin_edit.php', 'template_view.php', $this->model->get(intval($this->query['adminid'])));
 }

 public function action_changeStatus() {
  $this->view->ajax($this->model->changeStatus(intval($this->query['adminid'])));
 }

 public function action_create() {
  $this->view->ajax($this->model->create($this->query['admin']));
 }

 public function action_delete() {
  $this->view->ajax($this->model->delete($this->model->get(intval($this->query['adminid']))->adminid));
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['admin']));
 }

 public function action_getAll() {
  $this->view->ajax($this->model->getAjax());
 }

 public function action_show() {
  foreach ($this->model->get_data()->keys() as $id) {
   if ($this->model->get($id)->login == $this->query['login']) {
    $data = $this->model->get($id);
   }
  }
  $this->view->generate('admin_show.php', 'template_view.php', $data);
 }
}
