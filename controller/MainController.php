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
     * User stays logged in with session
     */
    if($this->userLogin->sessionIsSet()) {
      $this->layoutView->setLoginStatus($this->userLogin->sessionIsSet());
      return;
    }

    /**
     * If user does a login attempt either manually or by cookies. Directs to login controller.
     *
     */
    if ($this->loginView->tryLogin()) {
      $this->loginController->loginAttempt();
    }
    if ($this->loginView->cookieIsSet()) {
      $this->loginController->loginAttemptWithCookies();
    }

    /**
     * If user wants to log out    // Inte bra alls. Borde kanske göras i vy?
     */
    if ($this->loginView->logout()) {
      $this->layoutView->setLoginStatus(false);
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
