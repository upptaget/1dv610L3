<?php

namespace LoginSystemView;

class LayoutView {

  private $isLoggedIn;

  public function render(LoginView $lv, DateTimeView $dtv) {
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
              ' . $lv->response($this->isLoggedIn) . '

              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  private function displayLink() {
    if (!$this->isLoggedIn) {
      return '<a href="?register">Register a new user</a>';
    }
    else {
      return "" ;
    }
  }

  public function toRegister() {
    return isset($_GET['register']);
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
