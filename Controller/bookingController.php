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
            $type = $_POST['flight-type'];
            if ($type == "one-way") $kieuVe = 0;
            else if ($type == "two-way") $kieuVe = 1;
            $diemDi = $_POST['from'];
            $diemDen = $_POST['to'];
            $ngayDi1 = $_POST['date1'];
            $ngayDi2 = $_POST['date2'];
            $nguoiLon = $_POST['adult'];
            $treEm = $_POST['children'];
            $loaiVe = $_POST['type'];
            $tenKhachHang = $_POST['nameKH'];
            $cmndKhachHang = $_POST['cmndKH'];
            $sdtKhachHang = $_POST['phoneKH'];
            $diaChiKhachHang = $_POST['addressKH'];
            $bkModel->SaveVe($cmndKhachHang, $tenKhachHang, $sdtKhachHang, $diaChiKhachHang, $kieuVe, $loaiVe, $diemDi, $diemDen, $ngayDi1, $ngayDi2, $nguoiLon, $treEm);

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