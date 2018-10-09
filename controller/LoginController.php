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

  /**
   * Does a login attempt and catches exception to pass as message to view if failed.
   */
  public function LoginAttempt()
  {
    try {

      $loginAttempt = $this->userLogin->Login($this->loginView->getRequestUsername(),$this->loginView->getRequestPassword());
      $this->layoutView->setLoginStatus($loginAttempt);

    } catch (\Exception $e) {
      
      $this->loginView->setMessage($e->getMessage());
    }
  }
}
