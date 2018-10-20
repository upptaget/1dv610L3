<?php



require_once('modules/LoginComponent/Login.php');
require_once('modules/LoginComponent/view/LayoutView.php');
require_once('app/view/LayoutView.php');
require_once('app/controller/MainController.php');
require_once('app/view/toPostsButton.php');
require_once('app/view/PostForm.php');
require_once('app/model/Session.php');


error_reporting(E_ALL);
ini_set('display_errors', 'ON');
session_start();

$login = new \LoginSystem\Login();
$pButton = new \view\ToPostsButton();
$pf = new \view\PostForm();
$s = new \model\Session();
$lv = new \view\LayoutView($pButton, $pf);
$c = new \controller\MainController($pf, $s);



$loginModuleOutputHTML = $login->Login();

$s->getSession();

// $c->router();

$lv->render($loginModuleOutputHTML);
