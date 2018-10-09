<?php
namespace LoginSystemController;

class MainController {

  private $loginView;
  private $layoutView;
  private $loginController;

  public function __construct (RegisterController $rc, LoginController $lc, \LoginSystemView\LayoutView $v, \LoginSystemView\LoginView $lv) {
    $this->loginView = $lv;
    $this->layoutView = $v;
    $this->loginController = $lc;
  }

  /**
   * Checks for user actions
   */
  public function router() {
    if ($this->loginView->tryLogin() && !$this->loginView->keepLoggedIn()) {
      $this->loginController->LoginAttempt();
    }

    if ($this->loginView->tryLogin() && $this->loginView->keepLoggedIn()) {
      echo 'User clicked login, and wants to be kept logged in';
    }

    if ($this->layoutView->toRegister()) {
      echo 'User wants to register';
    }
  }
}
