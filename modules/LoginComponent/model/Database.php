<?php

namespace LoginSystemModel;

require_once('databaseConnectionVars.php');

class Database {

    /**
     * Connects to SQL db.
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
