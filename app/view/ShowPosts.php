<?php
namespace view;

class ShowPosts {

   private $posts;
   private $postsHTML;

   public function setPosts($posts) {
    $this->posts = $posts;
    $this->setPostsHTML();
   }

   public function getPostsHTML() {
    return $this->postsHTML;
   }

   private function setPostsHTML() {
    foreach ($this->posts as $post) {
      $this->postsHTML .= '
        <div>
          <p>Author: '. $post->author . ' </p>
          <p>Title: '. $post->title . ' </p>
          <p>Message: '. $post->message . ' </p>
        </div>

      ';
    }

  }
}
