<?php

namespace LoginSystemModel;

require_once('customExceptions.php');

class UserLogIn {

  //Database connection
  private $database;

  public function __construct(Database $db) {
    $this->database = $db;
  }

  /**
   * Checks database if credentials matches. If it does, session is set with id and name of user.
   */
  public function login($username, $password) {
		$connection = $this->database->connectToDatabase();
		$selection = $connection->prepare('SELECT id,name,password FROM users WHERE name = :name');
		$selection->bindParam(':name', $username);
		$selection->execute();
		$match = $selection->fetch(\PDO::FETCH_ASSOC);

		if($match && password_verify($password, $match['password'])) {

      $this->setSession($match['id'], $match['name']);

      return true;

		} else {

      throw new ValidationException('Credentials does not match');
		}
  }
  
  private function setSession($id, $username) {
    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;
  }

  public function destroySession() {
    unset($_SESSION['user_id']);
    session_destroy();
  }

  public function sessionIsSet() {
    return isset($_SESSION['user_id']);
  }
}
