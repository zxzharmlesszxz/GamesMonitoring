<?php

class Menu {
 protected $pages = Array();

 public function show() {
  foreach ($this->pages as $page) {
    echo "<li><a href='{$page['url']}' title='{$page['descr']}'>{$page['title']}</a></li>";
  }
 }

 public function add($name, $url, $title, $descr = '') {
  $this->pages[$name]['url'] = $url;
  $this->pages[$name]['title'] = $title;
  $this->pages[$name]['descr'] = $descr;
  $this->pages[$name]['name'] = $name;
 }
}
