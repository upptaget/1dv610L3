<?php
namespace LoginSystemController;

class RegisterController {

  private $registerView;
  private $userRegister;

  public function __construct (\LoginSystemModel\UserRegister $ur, \LoginSystemView\RegisterView $rv) {
    $this->userRegister = $ur;
    $this->registerView = $rv;
  }

  public function userRegister() {
    try{


      if($this->registerView->checkRegistrationPasswordsMatch()); {


        try {
          $this->userRegister->registerUser($this->registerView->getRegisterUsername(), $this->registerView->getRegisterPassword());

        } catch (\Exception $e){
          $this->registerView->setMessage($e->getMessage());
        }
       }
    } catch(\Exception $e) {
      $this->registerView->setMessage($e->getMessage());
    }
  }
  }
