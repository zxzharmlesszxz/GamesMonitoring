<?php

/**
* Controller for Games Class
**/

class Controller_Games extends Controller {
 public function action_index() {
  $this->view->generate('games_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit() {
  $this->view->generate('game_edit.php', 'template_view.php', $this->model->get(intval($this->query['gameid'])));
 }

 public function action_create() {
  $this->view->ajax($this->model->create($this->query['game']));
 }

 public function action_delete() {
  $this->view->ajax($this->model->delete($this->model->get(intval($this->query['gameid']))->gameid));
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['game']));
 }

 public function action_show() {
  $this->view->generate('game_show.php', 'template_view.php', ($this->model->get_data()->keyExists($this->query['gameid'])) ? $this->model->get($this->query['gameid']) : NULL);
 }

 public function action_getAll() {
  $this->view->ajax($this->model->getAjax());
 }
}
