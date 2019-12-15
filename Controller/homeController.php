<?php 
    require_once SITE_ROOT.'/Model/BookingModel.php';
    $p='home';
    $bkModel= new BookingModel();
    if (isset($_GET['destroy'])) session_destroy();

    if (isset($_GET['booking'])) {
        //if(isset($_SESSION['id']))echo"<p>".$_SESSION['id']."</p>";
        require_once SITE_ROOT.'/Controller/bookingController.php';
    }
    else if (isset($_GET['checking']))
    {
        $code;
        if(isset($_POST['email']) && isset($_POST['method']) && isset($_SESSION['id'])){
            $EMAIL=$_POST['email'];
            $METHOD=$_POST['method'];
            if($METHOD==1){
                $trangThai="Delivery";
            }
            else {
                $trangThai="Paid";
            }
            $trangThaiVe = new TrangThaiVe($_SESSION['id'],$trangThai,$EMAIL);
            $bkModel->insertTrangThaiVe($trangThaiVe);
        }
        if(isset($_POST['ticket-code'])){
            $code = $_POST['ticket-code'];
        }
        else if(isset($_SESSION['id'])){
            $code = $_SESSION['id'];
        }
        require_once SITE_ROOT.'/Controller/checkingController.php';
    } 
    else if(isset($_GET['checkout'])){
        $STRING="";
        $STRING2="";
       if(isset($_POST['listChoosed1'])){
           $STRING=$_POST['listChoosed1'];
       }
       if(isset($_POST['listChoosed2'])){
        $STRING2=$_POST['listChoosed2'];
        }
        if(isset($_POST['price'])){
            $PRICE=$_POST['price'];
            }
        require_once SITE_ROOT.'/Controller/checkoutController.php';
    }
    else 
    {
        session_destroy();
        require_once SITE_ROOT.'/View/home.php';
    }
    
?>