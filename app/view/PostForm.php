<?php

namespace view;

class PostForm {
  const NEW_POST_BUTTON = 'new_post_button';

  public function render($show) {
    $ret = '
    <form method="post" >
    <fieldset>
      <legend>New Post-it!</legend>
      <p id="userInfo"></p>

      <label for="Title">Title:</label>
      <input type="text" id="Title" name="title" value="" placeholder="Title.." />
      <br>

      <label for="Message">Note:</label>
      <textarea id="message" name="message" value="" placeholder="Your note.."></textarea>

      <input type="submit" name="' . self::NEW_POST_BUTTON .'" value="Post-It!" />
    </fieldset>
  </form>

    ';

    if($show) {
    return $ret;
    }
  }

  public function newPost() {
    return isset($_POST[self::NEW_POST_BUTTON]);
  }
}
