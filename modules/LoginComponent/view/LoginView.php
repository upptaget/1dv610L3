<?php

namespace LoginSystemView;

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private $message ='';
 	private $username = '';

	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response($isLoggedIn) {
		$response = '';

		if($isLoggedIn) {

			if($this->keepLoggedIn()) {
				$this->setCookies();
			}

			$response .= $this->generateLogoutButtonHTML();

		} else {

			$response = $this->generateLoginFormHTML();
		}

		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	public function generateLogoutButtonHTML() {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $this->message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}

	/**
	* Generate HTML code on the output buffer for the login form
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML() {
		return '
			<form method="post" >
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $this->message . '</p>

					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->username . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />

					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}

	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	public function getRequestUserName() {
		if (empty($_POST[self::$name])) {
			throw new \Exception('Username is missing');
		}
		return $_POST[self::$name];
	}

	public function getCookieUserName() {
		if (empty($_COOKIE[self::$cookieName])) {
			throw new \Exception('Username is missing from cookie');
		}
		return $_COOKIE[self::$cookieName];
	}

	public function getRequestPassword() {
		if (empty($_POST[self::$password])) {
			throw new \Exception('Password is missing');
		}
		return $_POST[self::$password];
	}

	public function getCookiePassword() {
		if (empty($_COOKIE[self::$cookiePassword])) {
			throw new \Exception('Password is missing from cookie');
		}
		return $_COOKIE[self::$cookiePassword];
	}

	//  login button is clicked
	public function tryLogin() : bool {
		return isset($_POST[self::$login]);
	}

	//	logout button is clicked
	public function logout() : bool {
		return isset($_POST[self::$logout]);
}

	// keep-login is checked
	public function keepLoggedIn() : bool {
		return isset($_POST[self::$keep]);
	}

	public function setDisplayUsername($username) {
		$this->username = $username;
	}

	public function setLoginMessage($message) {
		$this->message = $message;
	}

	public function cookieIsSet() {
		return isset($_COOKIE[self::$cookieName]) && isset($_COOKIE[self::$cookiePassword]);
	}

	public function setCookies() {
		\setcookie(self::$cookieName, $this->getRequestUserName(), time() + (86400 * 30));
		\setcookie(self::$cookiePassword, $this->getRequestPassword(), time() + (86400 * 30));

	}

	public function removeCookies() {
		\setcookie(self::$cookieName, '', time() - 3600);
		\setcookie(self::$cookiePassword, '', time() - 3600);
	}

	public function setMessage($message) {
		$this->message = $message;
	}

}
