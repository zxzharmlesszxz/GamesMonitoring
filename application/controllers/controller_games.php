<?php

/**
* Controller for Games Class
**/

class Controller_Games extends Controller {
 public function __construct() {
  parent::__construct();
 }

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
  $item = $this->model->get(intval($this->query['gameid']));
  $data = $this->model->delete(intval($item->gameid));
  $this->view->ajax($data);
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['game']));
 }

 public function action_show() {
  $items = $this->model->get_data();
  foreach ($items->keys() as $id) {
   if ($items->getItem($id)->gameid == $this->query['gameid']) {
    $data = $items->getItem($id);
   }
  }
  $this->view->generate('game_show.php', 'template_view.php', $data);
 }

 public function action_getAll() {
  $this->view->ajax($this->model->getAjax());
 }
}
