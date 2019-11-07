<?php 

    require_once SITE_ROOT.'/Dao/sanBayDao.php';
    require_once SITE_ROOT.'/Dao/loaiVeDao.php';
    require_once SITE_ROOT.'/Dao/chuyenBayDao.php';
    require_once SITE_ROOT.'/Model/BookingModel.php';

    $bkModel = new BookingModel();
    $p='home';

    // vào trang thanh toán
    if (isset($_GET['checkout'])) require_once SITE_ROOT.'/View/checkout.php';

    // vào trang hóa đơn
    else if (isset($_GET['checking'])) require_once SITE_ROOT.'/View/checking.php';

    // vẫn ở những trang booking
    else 
    {
        // load thành phố - sân bay
        $sanBayDao = new SanBayDao();
        $sanBayList = $sanBayDao->getAllSanBay();

        // load 3 loại vé
        $loaiVeDao = new LoaiVeDao();
        $loaiVeList = $loaiVeDao->getAllLoaiVe();

        // vào trang chọn ghế
        if (isset($_GET['choose_seat'])) 
        {
            // Lưu tạm dữ liệu
            
            $bkModel->SaveVe();

            // xét gì đó :))
            if(isset($_POST['from']) && isset($_POST['to'])) 
            {
                $from=$_POST['from'];
                $to=$_POST['to'];

                // $chuyenBayDao = new ChuyenBayDao();
                // $chuyenBayList=$chuyenBayDao->getChuyenBayByDiaDiem($from,$to);

            }

            // load trang chọn ghế
            require_once SITE_ROOT.'/View/choose_seat.php';
        }
        else 
        {
            // load trang booking
            require_once SITE_ROOT.'/View/booking.php';
        }
    }
    
?>