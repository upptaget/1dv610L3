<?php
namespace LoginSystemController;

class RegisterController {

  private $registerView;
  private $userRegister;

  public function __construct (\LoginSystemModel\UserRegister $ur, \LoginSystemView\RegisterView $rv) {
    $this->$userRegister = $ur;
    $this->registerView = $rv;
  }
}
