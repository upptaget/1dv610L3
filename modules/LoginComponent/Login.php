<?php

namespace LoginSystem;

// INCLUDE THE FILES NEEDED...
require_once('model/UserLogin.php');
require_once('model/UserRegister.php');
require_once('model/Database.php');
require_once('view/LoginView.php');
require_once('view/RegisterView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('controller/MainController.php');

// MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'ON');

class Login {


public function Login() {
$db = new \LoginSystemModel\Database();
$li = new \LoginSystemModel\UserLogin($db);
$ur = new \LoginSystemModel\UserRegister($db);
$lv = new \LoginSystemView\LoginView();
$rv = new \LoginSystemView\RegisterView();
$dtv = new \LoginSystemView\DateTimeView();
$v = new \LoginSystemView\LayoutView();
$lc = new \LoginSystemController\LoginController($li, $lv, $v);
$rc = new \LoginSystemController\RegisterController($ur, $rv, $lv);
$mc = new \LoginSystemController\MainController($rc, $lc, $v, $lv, $li, $rv);
$mc->router();
return $v->render($lv, $rv, $dtv);

}

}
