<?php 
    $p='home';
    $STRING;
    if(isset($_POST['listChoosed'])){
        $STRING=$_POST['listChoosed'];
    }
    require_once SITE_ROOT.'/View/checkout.php';
    
?>