<?php
namespace LoginSystemController;

class MainController {

  private $loginView;
  private $layoutView;
  private $registerView;
  private $loginController;
  private $registerController;
  private $userLogin;

  public function __construct (
    RegisterController $rc,
    LoginController $lc,
    \LoginSystemView\LayoutView $v,
    \LoginSystemView\LoginView $lv,
    \LoginSystemModel\UserLogIn $li,
    \LoginSystemView\RegisterView $rv
    ){

    $this->loginView = $lv;
    $this->layoutView = $v;
    $this->loginController = $lc;
    $this->userLogin = $li;
    $this->registerController = $rc;
    $this->registerView = $rv;
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
     * User has pressed register link and will be shown the register view.
     */
    if ($this->layoutView->toRegister()) {
      $this->layoutView->showRegisterForm($this->layoutView->toRegister());
    }

    /**
     * TODO:
     * User sent register post.
     */
    if($this->registerView->registration()) {
      $this->registerController->userRegister();
      $this->layoutView->showRegisterForm(false);
    }
  }
}
