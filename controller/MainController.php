<?php
namespace LoginSystemController;

class MainController {

  private $loginView;

  public function __construct (RegisterController $rc, LoginController $lc, \LoginSystemView\LoginView $lv) {
    $this->loginView = $lv;
  }

  public function router() {
    if ($this->loginView->tryLogin()) {
      echo 'User pressed login';
    }
    else {
      echo 'User has not pressed login';
    }
  }
}
