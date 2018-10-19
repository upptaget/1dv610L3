<?php



require_once('modules/LoginComponent/Login.php');
require_once('app/controller/MainController.php');
require_once('app/view/PostItView.php');


error_reporting(E_ALL);
ini_set('display_errors', 'ON');
session_start();

$login = new \LoginSystem\Login();
$pView = new \view\PostItView();
$pController = new \controller\MainController($pView);
$toPosts = isset($_SESSION['postApp']);
$login->Login($toPosts);
$pController->router();
