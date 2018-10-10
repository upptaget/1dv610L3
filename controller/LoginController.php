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
  public function loginAttempt()
  {
    try {

      $loginAttempt = $this->userLogin->login($this->loginView->getRequestUsername(),$this->loginView->getRequestPassword());
      $this->layoutView->setLoginStatus($loginAttempt);
      $this->loginView->setLoginMessage();

    } catch (\Exception $e) {

      $this->loginView->setMessage($e->getMessage());
    }
  }

  /**
   * Does a login attempt with cookies.
   */
  public function loginAttemptWithCookies()
  {
    try {

      $loginAttempt = $this->userLogin->login($this->loginView->getCookieUsername(),$this->loginView->getCookiePassword());
      $this->layoutView->setLoginStatus($loginAttempt);
      $this->loginView->setLoginMessage();

    } catch (\Exception $e) {

      $this->loginView->setMessage($e->getMessage());
    }
  }
}
