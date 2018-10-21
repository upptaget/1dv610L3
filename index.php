<?php

require_once('modules/LoginComponent/Login.php');
require_once('modules/LoginComponent/view/LayoutView.php');
require_once('app/controller/MainController.php');
require_once('app/view/LayoutView.php');
require_once('app/view/PostForm.php');
require_once('app/view/ShowPosts.php');
require_once('app/view/UserInfo.php');
require_once('app/model/Database.php');
require_once('app/model/Session.php');
require_once('app/model/GetPosts.php');
require_once('app/model/AddPost.php');


error_reporting(E_ALL);
ini_set('display_errors', 'OFF');
session_start();

$login = new \LoginSystem\Login();
$pf = new \view\PostForm();
$sp = new \view\ShowPosts();
$ui = new \view\UserInfo();
$db = new \model\Database();
$s = new \model\Session();
$gp = new \model\GetPosts();
$ap = new \model\AddPost();
$lv = new \view\LayoutView($pf, $sp);
$c = new \controller\MainController($s, $gp, $ap, $ui, $pf, $sp, $lv);


// Runs login module and gets HTML to render
$loginModuleOutputHTML = $login->Login();

//Runs app controller
$c->router();

//Renders result
$lv->render($loginModuleOutputHTML);
