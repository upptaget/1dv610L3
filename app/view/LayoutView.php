<?php

namespace view;

class LayoutView {
  private $loginLayoutView;
  private $postItView;
  private $test = 'Post it appen goes here';

  public function __construct ($piv, $logv) {
    $this->loginLayoutView = $logv;
    $this->postItView = $logv;
  }

  public function render($showLogin) {
    // IMPORTERA LoginView / PostItview
    echo '<!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Login Example</title>
        ' . $showLogin . '
        ' . $this->showPostIt() . '
    </html>
  ';
  }

  public function showPostIt() {
    if (isset($_POST['toPosts'])) {
      return '
      PostItApp goes here...
      ';
    }
  }
}
