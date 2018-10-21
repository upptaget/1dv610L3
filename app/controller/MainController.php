<?php

namespace controller;

use view\PostForm;
use view\LayoutView;


class MainController {

  private $session;
  private $userInfo;
  private $postForm;
  private $showPosts;
  private $addPost;
  private $layoutView;
  private $getPosts;

  public function __construct (
    \model\Session $s,
    \model\GetPosts $gp,
    \model\AddPost $ap,
    \view\UserInfo $ui,
    \view\PostForm $pf,
    \view\ShowPosts $sp,
    \view\LayoutView $lv )
    {
    $this->session = $s;
    $this->getPosts = $gp;
    $this->userInfo = $ui;
    $this->postForm = $pf;
    $this->showPosts = $sp;
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
      $this->layoutView->setHasLoggedIn($this->session->gotSession());
      $this->showPosts->setPosts($this->getPosts->getUserPosts($this->userInfo->getUserId()));

      }

    // ADDS NEW POST
    if ($this->postForm->newPost()) {

      try{
        $this->addPost->addPostToDatabase(
            $this->postForm->getPostTitle(),
            $this->postForm->getPostMessage(),
            $this->session->getUserId(),
            $this->session->getUsername());
            $this->postForm->setMessageToUser('Post-It! added!'); // FIXA KLASS FÖR STATISKA STRÄNGAR

      } catch (\Exception $e) {
        $this->postForm->setMessageToUser($e->getMessage());
      }
    }

  }



}
