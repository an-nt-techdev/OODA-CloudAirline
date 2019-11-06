<?php 

    require_once SITE_ROOT.'/Dao/sanBayDao.php';
    require_once SITE_ROOT.'/Dao/loaiVeDao.php';

    $p='home';

    if (isset($_GET['choose_seat'])) require_once SITE_ROOT.'/View/choose_seat.php';
    else if (isset($_GET['checkout'])) require_once SITE_ROOT.'/View/checkout.php';
    else if (isset($_GET['checking'])) require_once SITE_ROOT.'/View/checking.php';
    else 
    {
    
        $sanBayDao = new SanBayDao();
        $sanBayList = $sanBayDao->getAllSanBay();

        $loaiVeDao = new LoaiVeDao();
        $loaiVeList = $loaiVeDao->getAllLoaiVe();

        require_once SITE_ROOT.'/View/booking.php';
    }
    
?>