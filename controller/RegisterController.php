<?php
namespace LoginSystemController;

class RegisterController {

  private $registerView;
  private $userRegister;
  private $loginView;

  public function __construct (\LoginSystemModel\UserRegister $ur, \LoginSystemView\RegisterView $rv, \LoginSystemView\LoginView $lv) {
    $this->userRegister = $ur;
    $this->registerView = $rv;
    $this->loginView = $lv;
  }

  public function userRegister() {

    try{

      if($this->registerView->checkRegistrationPasswordsMatch()); {

          $this->userRegister->registerUser($this->registerView->getRegisterUsername(), $this->registerView->getRegisterPassword());
          $this->loginView->setDisplayUsername($this->registerView->getRegisterUserName());
       }

    } catch(\Exception $e) {

      $this->registerView->setMessage($e->getMessage());
    }
  }
  }
