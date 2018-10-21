<?php

namespace view;
/**
 * Holds the Post form for new Post-its.
 */
class PostForm {
  const FORM_TITLE = 'Post-It!';
  const NEW_POST_BUTTON = 'new_post_button';
  const POST_TEXTFIELD = 'post-textfield';
  const POST_TITLE = 'post_title';
  const INFO_TO_USER = 'info_to_user';

  private $messageToUser = '';

  public function render($show) {
    $ret = '
    <form method="post" >
    <h2>Write new Post-It:</h2>
    <fieldset>
      <legend>' . self::FORM_TITLE . '</legend>
      <p id="' . self::INFO_TO_USER . '">' . $this->messageToUser . '</p>

      <label for="Title">Title:</label>
      <input type="text" id="' . self::POST_TITLE . '" name="' . self::POST_TITLE . '" value="" placeholder="Title.." />
      <br>

      <label for="Message">Note:</label>
      <textarea id="'. self::POST_TEXTFIELD .'" name="'. self::POST_TEXTFIELD .'" value="" placeholder="Your note.."></textarea>

      <input type="submit" name="' . self::NEW_POST_BUTTON .'" value="Save-It!" />
    </fieldset>
  </form>

    ';

    if($show) {
    return $ret;
    }
  }

  public function setMessageToUser($message) {
    $this->messageToUser = $message;
  }

  public function getPostTitle() {
		if (empty($_POST[self::POST_TITLE])) {
			throw new \Exception('Title is missing');
    }
		return $_POST[self::POST_TITLE];
  }

  public function getPostMessage() {
		if (empty($_POST[self::POST_TEXTFIELD])) {
			throw new \Exception('Text is is missing');
    }
		return $_POST[self::POST_TEXTFIELD];
	}

  public function newPost() {
    return isset($_POST[self::NEW_POST_BUTTON]);
  }
}
