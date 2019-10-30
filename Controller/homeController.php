<?php 
    $p='home';

    if (isset($_POST['booking'])) require_once SITE_ROOT.'/Controller/bookingController.php';
    else if (isset($_POST['checking'])) require_once SITE_ROOT.'/Controller/checkingController.php';
    else require_once SITE_ROOT.'/View/home.php';
?>