<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('controller/MainController.php');
require_once('model/Database.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$lv = new \LoginSystemView\LoginView();
$dtv = new \LoginSystemView\DateTimeView();
$v = new \LoginSystemView\LayoutView();
$lc = new \LoginSystemController\LoginController();
$rc = new \LoginSystemController\RegisterController();
$mc = new \LoginSystemController\MainController($rc, $lc, $v, $lv);
$db = new \LoginSystemModel\Database();

$mc->router();
$db->connectToDatabase();

$v->render(false, $lv, $dtv);
