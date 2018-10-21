<?php
namespace model;

require_once('Database.php');

class AddPost {

  public function addPostToDatabase ($title, $message, $userId, $author) {
    $db = new \model\Database();
    $connection = $db->connectToDatabase();

    $sql = "INSERT INTO user_posts (title, message, user_id, author) VALUES (:title, :message, :user_id, :author)";

    $sqlstmt = $connection->prepare($sql);

    $sqlstmt->bindParam(':title', $title);
    $sqlstmt->bindParam(':message', $message);
    $sqlstmt->bindParam(':user_id', $userId);
    $sqlstmt->bindParam(':author', $author);

    try {
    $sqlstmt->execute();
    } catch (\Exception $e) {
      throw new \model\NewPostException('Could not save post to database');
    }
    return true;
  }

}
