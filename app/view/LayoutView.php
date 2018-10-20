<?php

namespace view;

class LayoutView {
  private $postItView;
  private $postForm;
  private $toPosts = 'toPosts';
  private $username;
  private $userId;

  public function __construct ($tpb, $pf) {
    $this->toPostButton = $tpb;
    $this->postForm = $pf;
  }

  public function render($showLogin) {
    echo '<!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Login and PostIt</title>
        <h1>PostIt!</h1>
        ' . $showLogin . '
        ' . $this->postForm->render($this->showPostIt()) . '
    </html>
  ';
  }

  public function showPostIt() {
    return isset($_POST[$this->toPosts]);
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getUsername() {
    return $this->username;
  }
}
