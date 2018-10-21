<?php

namespace model;

require_once('databaseConnectionVars.php'); // THIS IS A .GITIGNORED SETTINGS FILE CONTAINING DATABASE CONNECTION CONSTS.

class Database {

/**
 * Connects to SQL db
 *
 */
public function connectToDatabase () {

  $server = SERVER;
  $user = USER;
  $pass = PASSWORD;
  $database = DATABASE;

  try {
   return $connection = new \PDO("mysql:host=$server;dbname=$database;", $user, $pass);
  }
  catch(\PDOException $e) {
    echo $e->getMessage();
  }
}
}
