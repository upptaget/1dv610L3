<?php

namespace LoginSystemModel;

class UserLogIn {

  //Database connection
  private $database;

  public function __construct(Database $db) {
    $this->database = $db;
  }

  public function Login($username, $password) {
		$connection = $this->database->connectToDatabase();
		$selection = $connection->prepare('SELECT id,name,password FROM users WHERE name = :name');
		$selection->bindParam(':name', $username);
		$selection->execute();
		$match = $selection->fetch(\PDO::FETCH_ASSOC);

		if($match && password_verify($password, $match['password'])) {
      
      echo 'Logged in';
			return true;

		} else {
      echo 'Not logged in';
			return false;
		}
  }
}
