<?php

namespace controller;

class MainController {

  private $postItView;

  public function __construct (\view\PostItView $pv) {
    $this->postItView = $pv;
  }
  public function router() {
    if (isset($_SESSION['user_id'])) {

      return $this->postItView->render();
    }

  }



}
