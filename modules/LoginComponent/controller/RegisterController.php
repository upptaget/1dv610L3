<?php
namespace LoginSystemController;

require_once('modules/LoginComponent/view/Messages.php');


class RegisterController {

  private $registerView;
  private $userRegister;
  private $loginView;

  public function __construct (\LoginSystemModel\UserRegister $ur, \LoginSystemView\RegisterView $rv, \LoginSystemView\LoginView $lv) {
    $this->userRegister = $ur;
    $this->registerView = $rv;
    $this->loginView = $lv;
  }

  // Does a registration attempt, exception caught and sent as message.

  public function userRegister() {

    try{

      if($this->registerView->checkRegistrationPasswordsMatch()); {

          $this->userRegister->registerUser($this->registerView->getRegisterUsername(), $this->registerView->getRegisterPassword());
          $this->loginView->setDisplayUsername($this->registerView->getRegisterUserName());
          return true;
       }

    } catch(\LoginSystemModel\ExistingUsernameException $e) {
      $this->registerView->setMessage(\LoginSystemView\Messages::EXISTING_USER);
      return false;
    } catch(\Exception $e) {
       $this->registerView->setMessage($e->getMessage());
       return false;
     }
  }
  }
