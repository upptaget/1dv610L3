<?php



require_once('modules/LoginComponent/Login.php');
require_once('modules/LoginComponent/view/LayoutView.php');
require_once('app/view/LayoutView.php');
require_once('app/controller/MainController.php');
require_once('app/view/toPostsButton.php');
require_once('app/view/PostForm.php');


error_reporting(E_ALL);
ini_set('display_errors', 'ON');
session_start();

$login = new \LoginSystem\Login();
$pButton = new \view\ToPostsButton();
$pf = new \view\PostForm();
$lv = new \view\LayoutView($pButton, $pf);
$pController = new \controller\MainController($pf);



$showLogin = $login->Login();
// $pController->router();

$lv->render($showLogin);
