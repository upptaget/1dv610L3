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
   * Checks for user actions and directs to proper controller or view.
   */
  public function router() {

    /**
     * If user does a login attempt, with or without keep login box checked. Directs to login
     * controller.
     *
     */
    if ($this->loginView->tryLogin()) {
      $this->loginController->LoginAttempt();
    }
    if ($this->loginView->cookieIsSet()) {
      $this->loginController->LoginAttemptWithCookies();
    }

    /**
     * If user wants to log out
     */
    if ($this->loginView->logout()) {
      $this->layoutView->setLoginStatus(false);
      $this->loginView->setMessage('Bye bye!'); // This is not good.. use enum for messages?
    }

    /**
     * TODO:
     * User has pressed register link and will be shown the register view.
     */
    if ($this->layoutView->toRegister()) {
      echo 'User wants to register';
    }
  }
}
