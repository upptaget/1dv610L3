<?php

namespace LoginSystemModel;

class UserLogIn {

  //Database connection
  private $database;

  public function __construct(Database $db) {
    $this->database = $db;
  }

  /**
   * Checks database if credentials matches.
   */
  public function login($username, $password) {
		$connection = $this->database->connectToDatabase();
		$selection = $connection->prepare('SELECT id,name,password FROM users WHERE name = :name');
		$selection->bindParam(':name', $username);
		$selection->execute();
		$match = $selection->fetch(\PDO::FETCH_ASSOC);

		if($match && password_verify($password, $match['password'])) {

      $this->setSession($match['id']);

      return true;

		} else {

      throw new \Exception('Wrong name or password');
		}
  }

  private function setSession($id) {
    $_SESSION['user_id'] = $id;
  }

  public function sessionIsSet() {
    return isset($_SESSION['user_id']);
  }
}
