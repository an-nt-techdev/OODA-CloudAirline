<?php

require_once SITE_ROOT."/Dao/sanBayDao.php";
require_once SITE_ROOT."/Dao/loaiVeDao.php";
require_once SITE_ROOT."/Dao/veDao.php";
require_once SITE_ROOT."/Dao/chuyenBayDao.php";
require_once SITE_ROOT."/Dao/gheBayDao.php";
require_once SITE_ROOT."/Dao/loaiMayBayDao.php";

require_once SITE_ROOT."/Entity/ve.php";
require_once SITE_ROOT."/Entity/gheBay.php";
require_once SITE_ROOT."/Entity/loaiMayBay.php";


class BookingModel
{
    private $ve;
    private $gheBay;

    private $veDao;
    private $sanBayDao;
    private $loaiVeDao;
    private $chuyenBayDao;
    private $gheBayDao;
    private $loaiMayBayDao;

    public function __construct() 
	{
        $this->sanBayDao = new SanBayDao();
        $this->loaiVeDao = new LoaiVeDao();
        $this->chuyenBayDao = new ChuyenBayDao();
        $this->veDao = new VeDao();
        $this->gheBayDao = new GheBayDao();
        $this->loaiMayBayDao = new LoaiMayBayDao();
    }




    // Tạo ID ngẫu nhiên
    public function randomId()
    {
        $result = "";
        for ($i=1; $i<=15; $i++)
        {
            $rd1 = rand(1,3);
            if ($rd1 == 1)
            {
                $rd2 = rand(48, 57);
                $result = $result . chr($rd2);
            }
            else if ($rd1 == 2)
            {
                $rd2 = rand(65, 90);
                $result = $result . chr($rd2);
            }
            else if ($rd1 == 3)
            {
                $rd2 = rand(97, 122);
                $result = $result . chr($rd2);
            }
        }
        return $result;
    }




    // MODEL vé
    public function SaveVe($cmnd, $ten, $sdt, $diachi, $kieuve, $loaive, $diemDi, $diemDen, $ngayDi1, $ngayDi2, $nguoiLon, $treEm)
    {
        $sanBay1 = $this->sanBayDao->getIdByTenSanBay($diemDi);
        $sanBay2 = $this->sanBayDao->getIdByTenSanBay($diemDen);
        $loaiVe = $this->loaiVeDao->getIdByTenLoaiVe($loaive);

        if(!isset($_SESSION['id']))
        {
            $id = $this->randomId();
            $_SESSION['id'] = $id;
        }
        else 
        {
            unset($_SESSION['id']);
            $id = $this->randomId();
            $_SESSION['id'] = $id;
        }

        $this->ve = new Ve($_SESSION['id'], $cmnd, $ten, $sdt, $diachi, $kieuve, $loaiVe->getId(), $sanBay1->getId(), $sanBay2->getId(), $ngayDi1, $ngayDi2, $nguoiLon, $treEm);
        $this->veDao->insertVe($this->ve);
    }

    public function updateVe($Ve)
    {
        $tmp = $this->sanBayDao->getIdByTenSanBay($Ve->getDiemDi());
        $Ve->setDiemDi($tmp->getId());
        $tmp = $this->sanBayDao->getIdByTenSanBay($Ve->getDiemDen());
        $Ve->setDiemDen($tmp->getId());

        $this->veDao->updateVe($Ve);
    }

    public function getVeById($id)
    {        
        $this->ve = $this->veDao->getVeById($id);
        return $this->veDao->getVeById($id);
    }   
    



    // MODEL vé bay
    public function SaveGheBay($idChuyenBay, $idVe, $ghe, $ngayBay)
    {
        $this->gheBay = new GheBay($idChuyenBay, $idVe, $ghe, $ngayBay);
        $this->gheBayDao->insertGheBay($this->gheBay);
    }

    public function CountAirbus320($loaiVe, $nguoiLon, $treEm, $listGheBay)
    {
        $dem = 0;

        if ($loaiVe == "medium")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 1 && $listGheBay[$i]->getGhe() <= 15) $dem++;
            }

            if ($nguoiLon + $treEm > 15 - $dem) return "false";
            else return "true";
        }
        else if ($loaiVe == "hard")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 16 && $listGheBay[$i]->getGhe() <= 20) $dem++;
            }

            if ($nguoiLon + $treEm > 5 - $dem) return "false";
            else return "true";
        }
        else if ($loaiVe == "normal")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 21 && $listGheBay[$i]->getGhe() <= 50) $dem++;
            }

            if ($nguoiLon + $treEm > 30 - $dem) return "false";
            else return "true";
        }
    }

    public function CountAirbus380($loaiVe, $nguoiLon, $treEm, $listGheBay)
    {
        $dem = 0;

        if ($loaiVe == "medium")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 1 && $listGheBay[$i]->getGhe() <= 30) $dem++;
            }

            if ($nguoiLon + $treEm > 30 - $dem) return "false";
            else return "true";
        }
        else if ($loaiVe == "hard")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 31 && $listGheBay[$i]->getGhe() <= 70) $dem++;
            }

            if ($nguoiLon + $treEm > 40 - $dem) return "false";
            else return "true";
        }
        else if ($loaiVe == "normal")
        {
            return "false";
        }
    }

    public function CountBoeing777($loaiVe, $nguoiLon, $treEm, $listGheBay)
    {
        $dem = 0;

        if ($loaiVe == "medium")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 1 && $listGheBay[$i]->getGhe() <= 70) $dem++;
            }

            if ($nguoiLon + $treEm > 70 - $dem) return "false";
            else return "true";
        }
        else if ($loaiVe == "hard")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 71 && $listGheBay[$i]->getGhe() <= 80) $dem++;
            }

            if ($nguoiLon + $treEm > 10 - $dem) return "false";
            else return "true";
        }
        else if ($loaiVe == "normal")
        {
            for ($i = 0; $i < count($listGheBay); $i++)
            {
                if ($listGheBay[$i]->getGhe() >= 81 && $listGheBay[$i]->getGhe() <= 100) $dem++;
            }

            if ($nguoiLon + $treEm > 20 - $dem) return "false";
            else return "true";
        }
    }

    public function CheckGheBay($chuyenBay, $ngayBay, $nguoiLon, $treEm, $loaiVe)
    {
        $listGheBay = $this->gheBayDao->getGheBayByIdChuyenBayAndNgayBay($chuyenBay, $ngayBay);
        $cb = $this->getChuyenBayById($chuyenBay);

        if (strstr($cb->getIdMayBay(), "A320") != "") $c = $this->CountAirbus320($loaiVe, $nguoiLon, $treEm, $listGheBay);  
        else if (strstr($cb->getIdMayBay(), "A380") != "") $c = $this->CountAirbus380($loaiVe, $nguoiLon, $treEm, $listGheBay);
        else if (strstr($cb->getIdMayBay(), "B777") != "") $c = $this->CountBoeing777($loaiVe, $nguoiLon, $treEm, $listGheBay);

        return $c;
    }

    public function loadGheBay($chuyenBay, $ngayBay)
    {
        return $this->gheBayDao->getGheByIdChuyenBayAndNgayBay($chuyenBay, $ngayBay);
    }

    public function loadGheBayByIdVe($IdVe)
    {
        return $this->gheBayDao->getGheBayByIdVe($IdVe);
    }




    // MODEL loại vé
    public function getAllLoaiVe()
    {
        return $this->loaiVeDao->getAllLoaiVe();
    }

    public function getIdByTenLoaiVe($ten)
    {
        return $this->loaiVeDao->getIdByTenLoaiVe($ten);
    }

    public function getLoaiVeById($id)
    {
        return $this->loaiVeDao->getLoaiVeById($id);
    }




    // MODEL sân bay
    public function getAllSanBay()
    {
        return $this->sanBayDao->getAllSanBay();
    }

    public function getSanBayById($Id)
    {
        return $this->sanBayDao->getSanBayById($Id);
    }



    // MODEL chuyến bay
    public function getChuyenBayList($DiemDi,$DiemDen)
    {
        $sanBay1 = $this->sanBayDao->getIdByTenSanBay($DiemDi)->getId();
        $sanBay2 = $this->sanBayDao->getIdByTenSanBay($DiemDen)->getId();
 
        return $this->chuyenBayDao->getChuyenBayByDiaDiem($sanBay1, $sanBay2);
    }

    public function getChuyenBayById($Id)
    {
        return $this->chuyenBayDao->getChuyenBayById($Id);
    }




    //MODEL loại máy bay
    public function getLoaiMayBayByTen($ten)
    {
        return $this->loaiMayBayDao->getLoaiMayBayByTen($ten);
    }
}

?>