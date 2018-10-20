<?php
namespace view;

class UserInfo {

  private $username;
  private $id;

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getUserId() {
    return $this->id;
  }

  public function setUserId($userId) {
    $this->id = $userId;
  }
}
