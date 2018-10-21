<?php

namespace view;

class LayoutView {
  private $postItView;
  private $postForm;
  private $userInfo;
  private $showPosts;
  private $toPosts = 'toPosts';
  private $show;

  public function __construct ($tpb, $pf, $ui, $sp) {
    $this->toPostButton = $tpb;
    $this->postForm = $pf;
    $this->userInfo = $ui;
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
        ' . $this->postForm->render($this->show) . '
        ' . $this->showPosts->getPostsHTML() . '
    </html>
  ';
  }

  public function setShow($show) {
    $this->show = $show;
  }

  public function setPostsToDisplay($postsHTML) {
    return 0;
  }
}
