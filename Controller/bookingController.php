<?php 

    require_once SITE_ROOT.'/Dao/sanBayDao.php';
    require_once SITE_ROOT.'/Dao/loaiVeDao.php';
    require_once SITE_ROOT.'/Dao/chuyenBayDao.php';

    $p='home';



    if (isset($_GET['checkout'])) require_once SITE_ROOT.'/View/checkout.php';
    else if (isset($_GET['checking'])) require_once SITE_ROOT.'/View/checking.php';
    else 
    {
        
        $sanBayDao = new SanBayDao();
        $sanBayList = $sanBayDao->getAllSanBay();

        $loaiVeDao = new LoaiVeDao();
        $loaiVeList = $loaiVeDao->getAllLoaiVe();

        if (isset($_GET['choose_seat'])) {
            if(isset($_POST['from']) && isset($_POST['to'])) {$from=$_POST['from'];$to=$_POST['to'];

                // $chuyenBayDao = new ChuyenBayDao();
                // $chuyenBayList=$chuyenBayDao->getChuyenBayByDiaDiem($from,$to);

                }
            require_once SITE_ROOT.'/View/choose_seat.php';
            }
        else {
        require_once SITE_ROOT.'/View/booking.php';
        }
    }
    
?>