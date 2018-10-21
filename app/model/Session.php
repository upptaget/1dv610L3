<?php
namespace model;

/**
 * Handles session-related code.
 */
class Session {

  // id and username of logged in member
  private $username;
  private $id;


  public function getUsername() {
    return $this->username;
  }

  public function getUserId() {
    return $this->id;
  }

  /**
   * Gets session vairables from login, and sets membervariables.
   */
  public function getSession() {
    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $this->username = $_SESSION['username'];
    $this->id = $_SESSION['user_id'];
    }
  }


  public function gotSession() {
    return isset($this->username) && isset($this->id);
  }


}
