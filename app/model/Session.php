<?php
namespace model;

class Session {

  private $username;
  private $id;


  public function getUsername() {
    return $this->username;
  }

  public function getUserId() {
    return $this->id;
  }

  public function getSession() {
    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $this->username = $_SESSION['username'];
    $this->id = $_SESSION['user_id'];
    }
  }

  public function gotSession() {
    return isset($this->username) && isset($this->id);
  }

  public function setPostItSession($status) {
    $_SESSION['postIt'] = $status;
  }

  public function getPostItSession() {
    return isset($_SESSION['postIt']);
  }
}
