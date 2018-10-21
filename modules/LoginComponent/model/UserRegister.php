<?php

namespace LoginSystemModel;
require_once('customExceptions.php');
require_once('Database.php');


class UserRegister {

  // Registers a new user to the database. Exception thrown if failed.
  public function registerUser($username, $password) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $db = new Database();
    $connection = $db->connectToDatabase();

    // Searches the database for the desired username to avoid copies.
    $selection = $connection->prepare('SELECT id,name,password FROM users WHERE name = :name');
		$selection->bindParam(':name', $username);
		$selection->execute();
    $match = $selection->fetch(\PDO::FETCH_ASSOC);

    // If the username is available, the new user is added.
    if(!$match) {
    $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
    $addUser = $connection->prepare($sql);
    $addUser->bindParam(':name', $username);
    $addUser->bindParam(':password', $hashedPassword);

    try {
    $addUser->execute();
    return true;

    } catch(\PDOException $e) {
       echo $e->getMessage();
      }
    } else {
      throw new ExistingUsernameException();
    }
  }
}
