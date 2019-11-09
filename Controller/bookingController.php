<?php 

    require_once SITE_ROOT.'/Model/BookingModel.php';
    $p='home';
    $bkModel = new BookingModel();
    
    // vào trang thanh toán
    if (isset($_GET['checkout'])) require_once SITE_ROOT.'/View/checkout.php';

    // vào trang hóa đơn
    else if (isset($_GET['checking'])) require_once SITE_ROOT.'/View/checking.php';

    // vẫn ở những trang booking
    else 
    {
        // load thành phố - sân bay
        $sanBayList = $bkModel->getAllSanBay();

        // load 3 loại vé
        $loaiVeList = $bkModel->getAllLoaiVe();

        // vào trang chọn ghế
        if (isset($_GET['choose_seat']))
            if (!isset($_GET['change'])) 
                {
                    // Lưu tạm dữ liệu
                    $type = $_POST['flight-type'];
                    if ($type == "one-way") 
                    {
                        $kieuVe = 0;
                        $ngayDi2 = "1999-01-01";
                    }
                    else if ($type == "two-way")
                    {
                        $kieuVe = 1;
                        $ngayDi2 = $_POST['end'];
                    }

                    $diemDi = $_POST['from'];
                    $diemDen = $_POST['to'];
                    $ngayDi1 = $_POST['start'];
                
                    $nguoiLon = $_POST['adult'];
                    $treEm = $_POST['children'];
                    $loaiVe = $_POST['type'];
                    $tenKhachHang = $_POST['nameKH'];
                    $cmndKhachHang = $_POST['cmndKH'];
                    $sdtKhachHang = $_POST['phoneKH'];
                    $diaChiKhachHang = $_POST['addressKH']; 

                    
                    $bkModel->SaveVe($cmndKhachHang, $tenKhachHang, $sdtKhachHang, $diaChiKhachHang, $kieuVe, $loaiVe, $diemDi, $diemDen, $ngayDi1, $ngayDi2, $nguoiLon, $treEm);
                    $chuyenBayList=$bkModel->getChuyenBayList($diemDi,$diemDen);
                    // load trang chọn ghế
                    require_once SITE_ROOT.'/View/choose_seat.php';

                }

            else if ($_GET['change'] == "start")
            {
                $v = $bkModel->getVeById($_SESSION['id']);
                $v->setNgayDi1($_POST['start']);
                $v->setDiemDi($_POST['from']);
                $v->setDiemDen($_POST['to']);

                $bkModel->updateVe($v);
                $chuyenBayList=$bkModel->getChuyenBayList($_POST['from'],$_POST['to']);

                // load trang chọn ghế
                require_once SITE_ROOT.'/View/choose_seat.php';
            }

            else 
            {
                $v = $bkModel->getVeById($_SESSION['id']);
                $v->setNgayDi1($_POST['end']);
                $v->setDiemDi($_POST['from']);
                $v->setDiemDen($_POST['to']);

                $bkModel->updateVe($v);
                $chuyenBayList=$bkModel->getChuyenBayList($_POST['from'],$_POST['to']);
                
                // load trang chọn ghế
                require_once SITE_ROOT.'/View/choose_seat.php';
            }

        else 
        {
            // load trang booking
            if(!isset($_SESSION['id'])){
                    $id = $bkModel->randomId();
                    $_SESSION['id']=$id;
            }
            require_once SITE_ROOT.'/View/booking.php';
        }
    }
    
?>