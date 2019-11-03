<?php

class GheBay()
{
    private $idChuyenBay;
    private $idVe;
    private $ghe;
    private $ngayBay;

	public function __construct( $IdMayBay, $IdVe, $Ghe, $NgayBay)
    {
        $this->idMayBay = $IdMayBay;
        $this->idVe = $IdVe;
        $this->ghe = $Ghe;
        $this->ngayBay = $NgayBay;
    }

    public function getIdMayBay()
    {
        return $this->idMayBay;
    }

    public function setIdMayBay($IdMayBay)
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