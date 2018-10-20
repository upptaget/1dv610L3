<?php

namespace view;

class ToPostsButton {
  const TO_POSTS_BUTTON = 'new_post_button';

  public function render () {
    $ret = '
    '. $this->newPostButtonFormHTML() .'
    ';
    return $ret;
  }

  public function newPostButtonFormHTML() {
    return '<form method="post">
    <button name="' . self::TO_POSTS_BUTTON . '" value="'. self::TO_POSTS_BUTTON .'" type="submit">New Post-It</button>
    </form>';
  }

  public function toNewPost() {
    return isset($_POST[self::TO_POSTS_BUTTON]);
  }
}
