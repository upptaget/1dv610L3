<?php
namespace LoginSystemController;

class MainController {

  private $loginView;
  private $layoutView;

  public function __construct (RegisterController $rc, LoginController $lc, \LoginSystemView\LayoutView $v, \LoginSystemView\LoginView $lv) {
    $this->loginView = $lv;
    $this->layoutView = $v;
  }


  public function router() {
    if ($this->loginView->tryLogin() && !$this->loginView->keepLoggedIn()) {
      echo 'User pressed login';
    }

    if ($this->loginView->tryLogin() && $this->loginView->keepLoggedIn()) {
      echo 'User clicked login, and wants to be kept logged in';
    }

    if ($this->layoutView->userWantsToRegister()) {
      echo 'User wants to register';
    }
  }
}
