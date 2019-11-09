<?php 
    $p='home';
    if (isset($_GET['booking'])) require_once SITE_ROOT.'/Controller/bookingController.php';
    else if (isset($_GET['checking']))
    {
        $code = $_POST['ticket-code'];
        require_once SITE_ROOT.'/Controller/checkingController.php';
    } 
    else require_once SITE_ROOT.'/View/home.php';
    
?>