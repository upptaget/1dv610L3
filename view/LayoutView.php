<?php

namespace LoginSystemView;

class LayoutView {

  private $isLoggedIn;
  private $wantToRegister;

  public function render(LoginView $lv, RegisterView $rv, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->displayLink() . '
          ' . $this->renderIsLoggedIn() . '

          <div class="container">
              ' . $this->showLoginOrRegister($lv, $rv) . '

              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  private function displayLink() {
    if (!$this->isLoggedIn && !$this->wantToRegister) {
      return '<a href="?register">Register a new user</a>';
    }
    if($this->wantToRegister) {
      return '<a href="?">Back to login</a>' ;
    }
  }

  public function showLoginOrRegister($lv, $rv) {
    if($this->wantToRegister) {
      return $rv->response();
    }
    return $lv->response($this->isLoggedIn);
  }

  public function toRegister() {
    return isset($_GET['register']);
  }

  public function showRegisterForm($wantToRegister) {
    $this->wantToRegister = $wantToRegister;
  }

  private function renderIsLoggedIn() {
    if ($this->isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  public function setLoginStatus(bool $isLoggedIn) {
		$this->isLoggedIn = $isLoggedIn;
	}
}
