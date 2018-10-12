<?php

namespace LoginSystemModel;
require_once('customExceptions.php');
require_once('Database.php');


class UserRegister {

  public function registerUser($password, $username) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $db = new Database();
    $connection = $db->connectToDatabase();

    $selection = $connection->prepare('SELECT id,name,password FROM users WHERE name = :name');
		$selection->bindParam(':name', $username);
		$selection->execute();
    $match = $selection->fetch(\PDO::FETCH_ASSOC);

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
      throw new \ExistingUsernameException();
    }
  }
}
