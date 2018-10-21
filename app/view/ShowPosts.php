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

   // Adds every post in posts to html-string to the postsHTML member.
   private function setPostsHTML() {
    foreach ($this->posts as $post) {
      $this->postsHTML .= '
        <div>
          <fieldset>
          <legend>'. $post->title . '</legend>
            <p>Author: '. $post->author . ' </p>
            <p>Message: '. $post->message . ' </p>
            <p>Time Added: ' . $post->date . ' </p>
            <form>
            <button type="submit" name"delete_button" value="'.$post->id.'">Delete</button>
            <button type="submit" name="edit_button" value="'.$post->id.'">Edit</button>
            </form>
          </fieldset>
        </div>

      ';
    }

  }
}
