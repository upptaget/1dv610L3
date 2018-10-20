<?php

namespace controller;

class MainController {

  private $postItView;

  public function __construct (\view\PostForm $pf) {
    $this->postItView = $pf;
  }
  public function router() {

    if ($this->postItView->toNewPost()) {
      $this->postItView->setShowPostForm();
    }

  }



}
