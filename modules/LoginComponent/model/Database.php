<?php

namespace LoginSystemModel;

class Database {

    /**
     * Connects to SQL db on localhost.
     *
     */
    public function connectToDatabase () {

      $server = "localhost";
      $user = "test";
      $pass = "test";
      $database = "auth";

      try {
			 return $connection = new \PDO("mysql:host=$server;dbname=$database;", $user, $pass);
		  }
		  catch(\PDOException $e) {
			  echo $e->getMessage();
      }
    }
  }
