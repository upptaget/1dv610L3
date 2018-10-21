<?php

namespace controller;

use view\PostForm;
use view\LayoutView;


class MainController {

  private $session;
  private $userInfo;
  private $postForm;
  private $addPost;
  private $layoutView;

  public function __construct (\model\Session $s, \model\AddPost $ap, \view\UserInfo $ui, \view\PostForm $pf, \view\LayoutView $lv) {
    $this->session = $s;
    $this->userInfo = $ui;
    $this->postForm = $pf;
    $this->addPost = $ap;
    $this->layoutView = $lv;
  }
  public function router() {

    // GET SESSION VARAIBLES
    $this->session->getSession();

    // SET SESSION VARIABLES TO USER VIEW
    if ($this->session->gotSession()) {
      $this->userInfo->setUsername($this->session->getUsername());
      $this->userInfo->setUserId($this->session->getUserId());
      $this->session->setPostItSession($this->session->gotSession());
    }

    // SET SESSION SO USER STAYS IN POST IT APP



    if ($this->session->getPostItSession() && $this->session->gotSession())
      {
        $this->layoutView->setShow($this->session->getPostItSession());
      }

    // ADDS NEW POST
    if ($this->postForm->newPost()) {

      try{
        $this->addPost->addPostToDatabase(
            $this->postForm->getPostTitle(),
            $this->postForm->getPostMessage(),
            $this->session->getUserId(),
            $this->session->getUsername());
            $this->postForm->setMessage('Post-It! added!'); // FIXA KLASS FÖR STATISKA STRÄNGAR

      } catch (\Exception $e) {
          echo $e->getMessage();
      }
    }

  }



}
