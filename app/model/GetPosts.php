<?php
namespace model;

require_once('Database.php');

class GetPosts {

  public function getUserPosts ($userId) {
    $db = new \model\Database();
    $connection = $db->connectToDatabase();

    $sql = "SELECT * FROM `user_posts` WHERE user_id = '$userId'";

    $sqlstmt = $connection->prepare($sql);

    try {
    $sqlstmt->execute();
    $data = $sqlstmt->fetchAll(\PDO::FETCH_OBJ);
    return $data;

    } catch (\Exception $e) {
        throw new \model\GetPostsException('Could get posts from database');
    }
  }

}
