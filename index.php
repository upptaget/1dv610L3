<?php



require_once('modules/LoginComponent/Login.php');
require_once('modules/LoginComponent/view/LayoutView.php');
require_once('app/controller/MainController.php');
require_once('app/view/LayoutView.php');
require_once('app/view/toPostsButton.php');
require_once('app/view/PostForm.php');
require_once('app/view/ShowPosts.php');
require_once('app/view/UserInfo.php');
require_once('app/model/Database.php');
require_once('app/model/Session.php');
require_once('app/model/GetPosts.php');
require_once('app/model/AddPost.php');


error_reporting(E_ALL);
ini_set('display_errors', 'ON');
session_start();

$login = new \LoginSystem\Login();
$tpb = new \view\ToPostsButton();
$pf = new \view\PostForm();
$sp = new \view\ShowPosts();
$ui = new \view\UserInfo();
$db = new \model\Database();
$s = new \model\Session();
$gp = new \model\GetPosts();
$ap = new \model\AddPost();
$lv = new \view\LayoutView($tpb, $pf, $ui, $sp);
$c = new \controller\MainController($s, $gp, $ap, $ui, $pf, $sp, $lv);



$loginModuleOutputHTML = $login->Login();

$c->router();

$lv->render($loginModuleOutputHTML);
