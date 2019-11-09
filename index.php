<?php 
require_once("Config/config.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$homeUrl = $_SERVER['REQUEST_URI'];
loadHome:	
require_once SITE_ROOT."/Controller/homeController.php";
?> 