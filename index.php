<?php



require_once('modules/LoginComponent/Login.php');
require_once('modules/LoginComponent/view/LayoutView.php');
require_once('app/view/LayoutView.php');
require_once('app/controller/MainController.php');
require_once('app/view/PostItView.php');


error_reporting(E_ALL);
ini_set('display_errors', 'ON');
session_start();

$login = new \LoginSystem\Login();
$pView = new \view\PostItView();
$logv = new \LoginSystemView\LayoutView();
$lv = new \view\LayoutView($pView, $logv);
$pController = new \controller\MainController($pView);



$showLogin = $login->Login();

$lv->render($showLogin);
