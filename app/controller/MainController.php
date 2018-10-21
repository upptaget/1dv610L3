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

    // Get session variables
    $this->session->getSession();

    // Set session variables to user view.
    if ($this->session->gotSession()) {
      $this->userInfo->setUsername($this->session->getUsername());
      $this->userInfo->setUserId($this->session->getUserId());
      $this->layoutView->setHasLoggedIn($this->session->gotSession());

    }

    // Adds new post, then up
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

    //Set users posts to be shown
    $this->showPosts->setPosts($this->getPosts->getUserPosts($this->userInfo->getUserId()));
  }



}
