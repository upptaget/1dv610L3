<?php

namespace view;

class PostForm {

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

      <input type="submit" name="postButton" value="Post-It!" />
    </fieldset>
  </form>

    ';

    if($show) {
    return $ret;
    }
  }

}
