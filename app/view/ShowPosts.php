<?php
namespace view;

/**
 * Converts object from database to HTML string for presentation
 */

class ShowPosts {

   private $posts;
   private $postsHTML = '<h2>Your Post-Its:</h2>';

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
          <fieldset>
          <legend>'. $post->title . '</legend>
            <p>Author: '. $post->author . ' </p>
            <p>Message: '. $post->message . ' </p>
            <p>Time Added: ' . $post->date . ' </p>
            <button>Delete</button><button>Edit</button>
          </fieldset>
        </div>

      ';
    }

  }
}
