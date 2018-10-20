<?php

namespace controller;

class MainController {

  private $postItView;
  private $session;

  public function __construct (\view\PostForm $pf, \model\Session $s) {
    $this->postItView = $pf;
    $this->session = $s;
  }
  public function router() {

    if ($this->postItView->toNewPost()) {
      $this->postItView->setShowPostForm();
    }

  }



}
