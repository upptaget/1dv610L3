<?php
namespace LoginSystemController;

class MainController {

  private $loginView;
  private $layoutView;
  private $loginController;
  private $userLogin;

  public function __construct (RegisterController $rc, LoginController $lc, \LoginSystemView\LayoutView $v, \LoginSystemView\LoginView $lv, \LoginSystemModel\UserLogIn $li) {
    $this->loginView = $lv;
    $this->layoutView = $v;
    $this->loginController = $lc;
    $this->userLogin = $li;
  }

  /**
   * Checks for user actions and directs to proper controller or view.
   */
  public function router() {

    /**
     * Attempts logging in with session, otherwise cookies, otherwise from form data.
     */
    if($this->userLogin->sessionIsSet()) {
      $this->layoutView->setLoginStatus($this->userLogin->sessionIsSet());
    } else if ($this->loginView->cookieIsSet()) {
      $this->loginController->loginAttemptWithCookies();
    } else if ($this->loginView->tryLogin()) {
      $this->loginController->loginAttempt();
    }


    /**
     * If user wants to log out    // Inte bra alls. Borde kanske göras i vy?
     */
    if ($this->loginView->logout()) {
      $this->userLogin->destroySession();
      $this->layoutView->setLoginStatus($this->userLogin->sessionIsSet());
      $this->loginView->removeCookies();
      $this->loginView->setLoginMessage();
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
