<?php
namespace LoginSystemController;

class LoginController {

  private $userLogin;

  public function __construct (\LoginSystemModel\UserLogin $li) {
    $this->userLogin = $li;
  }
  public function LoginAttempt()
  {
    $this->userLogin->Login('test', 'testar');
  }
}
