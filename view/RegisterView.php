<?php

namespace LoginSystemView;

class RegisterView {

  private static $name = 'RegisterView::UserName';
  private static $password = 'RegisterView::Password';
  private static $passwordRepeat = 'RegisterView::PasswordRepeat';
  private static $messageId = 'RegisterView::Message';
	private static $register = 'RegisterView::Register';
	private $message = '';

  public function response() {

		$response = $this->generateRegisterFormHTML($this->message);

		return $response;
	}

private function generateRegisterFormHTML($message) {
		return '
			<form method="post" >
				<fieldset>
					<legend>Register new user - Enter username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>

					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->displayUsername() . '" />

					<label for="' . self::$password . '">Password :</label>
          <input type="password" id="' . self::$password . '" name="' . self::$password . '" />

          <label for="' . self::$passwordRepeat . '">Confirm Password :</label>
					<input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />

					<input type="submit" name="' . self::$register . '" value="register" />
				</fieldset>
			</form>
		';
	}

	private function displayUsername() {
		if(isset($_POST[self::$name])) {
			$checkedForTags = preg_replace('/(\<.*?\>)/', '', $_POST[self::$name]);
			return preg_replace('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', '', $checkedForTags);
		} else {
			return '';
		}
	}

  public function getRegisterUserName() {
		if(empty($_POST[self::$name]) || strlen($_POST[self::$name]) < 3) { //Magic number
			throw new Exception('Username has too few characters, at least 3 characters.');
		}
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST[self::$name])) {
			throw new Exception('Username contains invalid characters.');
		}
		return $_POST[self::$name];
}
	public function getRegisterPassword() {
		if (empty($_POST[self::$password]) || strlen($_POST[self::$password]) < 6) { // Magic number
			throw new Exception('Password has too few characters, at least 6 characters.');
		}
		return $_POST[self::$password];
	}

	public function checkRegistrationPasswordsMatch() {
		if ($_POST[self::$password] != $_POST[self::$passwordRepeat]) {
			throw new Exception('Passwords do not match.');
		}
	}

	public function setMessage($message) {
		$this->message .= $message . '<br>';
	}
}
