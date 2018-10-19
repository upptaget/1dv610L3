<?php


namespace LoginSystemController;

require_once('modules/LoginComponent/view/Messages.php');

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
      $this->loginView->setDisplayUserName($this->loginView->getRequestUsername());
      $loginAttempt = $this->userLogin->login($this->loginView->getRequestUsername(),$this->loginView->getRequestPassword());
      $this->layoutView->setLoginStatus($loginAttempt);
      $this->loginView->setLoginMessage(\LoginSystemView\Messages::WELCOME_ON_LOGIN);

    }  catch (\LoginSystemModel\ValidationException $e) {

      $this->loginView->setMessage(\LoginSystemView\Messages::FAILED_LOGIN);

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
      $this->loginView->setLoginMessage(\LoginSystemView\Messages::WELCOME_ON_COOKIE_LOGIN);

    } catch (\Exception $e) {

      $this->loginView->setMessage(\LoginSystemView\Messages::FAILED_LOGIN_WITH_COOKIE);
    }
  }
}
