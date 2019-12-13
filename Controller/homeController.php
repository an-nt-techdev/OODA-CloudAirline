<?php 
    $p='home';

    if (isset($_GET['destroy'])) session_destroy();

    if (isset($_GET['booking'])) {
        //if(isset($_SESSION['id']))echo"<p>".$_SESSION['id']."</p>";
        require_once SITE_ROOT.'/Controller/bookingController.php';
    }
    else if (isset($_GET['checking']))
    {
        $code = $_POST['ticket-code'];
        require_once SITE_ROOT.'/Controller/checkingController.php';
    } 
    else if(isset($_GET['checkout'])){
        $STRING=$_POST['listChoosed'];
        require_once SITE_ROOT.'/Controller/checkoutController.php';
    }
    else require_once SITE_ROOT.'/View/home.php';
    
?>