<?php
namespace LoginSystemController;

class LoginController {

  private $userLogin;
  private $loginView;

  public function __construct (\LoginSystemModel\UserLogin $li, \LoginSystemView\LoginView $lv) {
    $this->userLogin = $li;
    $this->loginView = $lv;

  }
  public function LoginAttempt()
  {
    try {
    $this->userLogin->Login($this->loginView->getRequestUsername(), $this->loginView->getRequestPassword());
    } catch (\Exception $e) {
      $this->loginView->setMessage($e->getMessage());
    }
  }
}
