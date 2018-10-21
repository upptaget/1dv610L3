<?php

namespace view;

class LayoutView {
  private $postItView;
  private $postForm;
  private $userInfo;
  private $toPosts = 'toPosts';
  private $show;

  public function __construct ($tpb, $pf, $ui) {
    $this->toPostButton = $tpb;
    $this->postForm = $pf;
    $this->userInfo = $ui;
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
    </html>
  ';
  }

  public function setShow($show) {
    $this->show = $show;
  }
}
