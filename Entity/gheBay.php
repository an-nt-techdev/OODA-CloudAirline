<?php

class GheBay
{
    private $idChuyenBay;
    private $idVe;
    private $ghe;
    private $ngayBay;

	public function __construct( $IdChuyenBay, $IdVe, $Ghe, $NgayBay)
    {
        $this->idChuyenBay = $IdChuyenBay;
        $this->idVe = $IdVe;
        $this->ghe = $Ghe;
        $this->ngayBay = $NgayBay;
    }

    public function getIdChuyenBay()
    {
        return $this->idMayBay;
    }

    public function setIdChuyenBay($IdMayBay)
    {
        $this->idMayBay = $IdMayBay;
    }

    public function getIdVe()
    {
        return $this->idVe;
    }

    public function setIdVe($IdVe)
    {
        $this->idVe = $IdVe;
    }

    public function getGhe()
    {
        return $this->ghe;
    }

    public function setGhe($Ghe)
    {
        $this->ghe = $Ghe;
    }

    public function getNgayBay()
    {
        return $this->ngayBay;
    }

    public function setNgayBay($NgayBay)
    {
        $this->ngayBay = $NgayBay;
    }
    
}

?>