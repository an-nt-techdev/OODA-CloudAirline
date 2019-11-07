<?php

require_once SITE_ROOT."/Dao/sanBayDao.php";
require_once SITE_ROOT."/Dao/loaiVeDao.php";
require_once SITE_ROOT."/Entity/ve.php";
require_once SITE_ROOT."/Dao/chuyenBayDao.php";
class BookingModel
{
    private $ve;
    private $sanBayDao;
    private $loaiVeDao;
    private $chuyenBayDao;

    public function __construct() 
	{
        $this->sanBayDao = new SanBayDao();
        $this->loaiVeDao = new LoaiVeDao();
        $this->chuyenBayDao = new ChuyenBayDao();
    }

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
    }

    public function SaveVe($cmnd, $ten, $sdt, $diachi, $kieuve, $loaive, $diemDi, $diemDen, $ngayDi1, $ngayDi2, $nguoiLon, $treEm)
    {
        $sanBay1 = $this->sanBayDao->getIdByTenSanBay($diemDi);
        $sanBay2 = $this->sanBayDao->getIdByTenSanBay($diemDen);
        $loaiVe = $this->loaiVeDao->getIdByTenLoaiVe($loaive);
        $id = $this->randomId();

        $this->ve = new Ve($id, $cmnd, $ten, $sdt, $diachi, $kieuve, $loaiVe->getId(), $sanBay1->getId(), $sanBay2->getId(), $ngayDi1, $ngayDi2, $nguoiLon, $treEm);
    }

    public function getVe()
    {
        return $this->ve;
    }
    
    public function getChuyenBayList($DiemDi,$DiemDen){
        $sanBay1 = $this->sanBayDao->getIdByTenSanBay($DiemDi)->getId();
        $sanBay2 = $this->sanBayDao->getIdByTenSanBay($DiemDen)->getId();

        return $this->chuyenBayDao->getChuyenBayByDiaDiem($sanBay1, $sanBay2);
    }
    

}

?>