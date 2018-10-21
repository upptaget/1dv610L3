<?php

namespace LoginSystemView;

class DateTimeView {

	// Shows current date and time.
	public function show() {

		$timeString = date('l, \t\h\e jS \of F Y, \T\h\e \t\i\m\e \i\s G:i:s');

		return '<p>' . $timeString . '</p>';
	}
}
