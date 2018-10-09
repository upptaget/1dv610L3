<?php
namespace LoginSystemController;

class LoginController {

  private $userLogin;
  private $loginView;

  public function __construct (\LoginSystemModel\UserLogin $li, \LoginSystemView\LoginView $lv, \LoginSystemView\LayoutView $v) {
    $this->userLogin = $li;
    $this->loginView = $lv;
    $this->layoutView = $v;

  }
  public function LoginAttempt()
  {
    try {
    $this->layoutView->setLoginStatus(
        $this->userLogin->Login($this->loginView->getRequestUsername(),$this->loginView->getRequestPassword())
      );
    } catch (\Exception $e) {
      $this->loginView->setMessage($e->getMessage());
    }
  }
}
