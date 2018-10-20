<?php

namespace controller;

class MainController {

  private $session;
  private $userInfo;

  public function __construct (\model\Session $s, \view\UserInfo $ui) {
    $this->session = $s;
    $this->userInfo = $ui;
  }
  public function router() {

    $this->session->getSession();

    if ($this->session->gotSession()) {
      $this->userInfo->setUsername($this->session->getUsername());
      $this->userInfo->setUserId($this->session->getUserId());
     echo $this->userInfo->getUserId();
    }

  }



}
