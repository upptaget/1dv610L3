<?php

namespace view;
/**
 * Renders the application
 */
class LayoutView {
  private $postForm;
  private $showPosts;

  private $hasLoggedIn;

  public function __construct ($pf, $sp) {
    $this->postForm = $pf;
    $this->showPosts = $sp;
  }

  public function render($showLogin) {
    echo '<!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Login and PostIt</title>
        <h1>PostIt!</h1>
        ' . $showLogin . '
        ' . $this->postForm->render($this->hasLoggedIn) . '
        ' . $this->displayPosts() . '
    </html>
  ';
  }

  public function setHasLoggedIn($loggedIn) {
    $this->hasLoggedIn = $loggedIn;
  }

  public function displayPosts() {
    if($this->hasLoggedIn) {
      return $this->showPosts->getPostsHTML();
    }
  }
}
