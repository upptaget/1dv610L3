<?php

namespace controller;

use view\PostForm;


class MainController {

  private $session;
  private $userInfo;
  private $postForm;
  private $addPost;

  public function __construct (\model\Session $s, \model\AddPost $ap, \view\UserInfo $ui, \view\PostForm $pf) {
    $this->session = $s;
    $this->userInfo = $ui;
    $this->postForm = $pf;
    $this->addPost = $ap;
  }
  public function router() {

    // GET SESSION VARAIBLES
    $this->session->getSession();

    // SET SESSION VARIABLES TO USER VIEW
    if ($this->session->gotSession()) {
      $this->userInfo->setUsername($this->session->getUsername());
      $this->userInfo->setUserId($this->session->getUserId());
    }

    // ADDS NEW POST
    if ($this->postForm->newPost()) {

      try{
        $this->addPost->addPostToDatabase(
            $this->postForm->getPostTitle(),
            $this->postForm->getPostMessage(),
            $this->session->getUserId(),
            $this->session->getUsername());

      } catch (\Exception $e) {
          echo $e->getMessage();
      }
    }

  }



}
