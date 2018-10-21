<?php

namespace view;
/**
 * Holds the Post form for new Post-its.
 */
class PostForm {

  //HTML-Element id's
  const FORM_TITLE = 'Post-It!';
  const NEW_POST_BUTTON = 'new_post_button';
  const POST_TEXTFIELD = 'post-textfield';
  const POST_TITLE = 'post_title';
  const INFO_TO_USER = 'info_to_user';
  const SHARE_USERNAME = 'share_username';

  private $messageToUser = '';

  public function render($show) {
    $ret = '
    <h2>Write new Post-It:</h2>
    <fieldset>
    <form method="post">
      <legend>' . self::FORM_TITLE . '</legend>
      <p id="' . self::INFO_TO_USER . '">' . $this->messageToUser . '</p>

      <label for="Title">Title:</label>
      <input type="text" id="' . self::POST_TITLE . '" name="' . self::POST_TITLE . '" value="" placeholder="Title.." />
      <br>

      <label for="Message">Message:</label>
      <textarea id="'. self::POST_TEXTFIELD .'" name="'. self::POST_TEXTFIELD .'" value="" placeholder="Your note.."></textarea>
      <br>

      <label for="ShareBox">Share:</label>
      <input name="Sharebox" type="checkbox"/> <input type="text" id="' . self::SHARE_USERNAME . '" name="' . self::SHARE_USERNAME . '" value="" placeholder="Share with.." />

      <input type="submit" name="' . self::NEW_POST_BUTTON .'" value="Save-It!" />
      </form>
    </fieldset>

    ';

    if($show) {
    return $ret;
    }
  }

  public function setMessageToUser($message) {
    $this->messageToUser = $message;
  }


   // Returns by user provided title or Exception
  public function getPostTitle() {
		if (empty($_POST[self::POST_TITLE])) {
			throw new \Exception('Title is missing');
    }
		return $_POST[self::POST_TITLE];
  }

  // Returns by user provided message or Exception
  public function getPostMessage() {
		if (empty($_POST[self::POST_TEXTFIELD])) {
			throw new \Exception('Message is is missing');
    }
		return $_POST[self::POST_TEXTFIELD];
	}

  public function newPost() {
    return isset($_POST[self::NEW_POST_BUTTON]);
  }
}
