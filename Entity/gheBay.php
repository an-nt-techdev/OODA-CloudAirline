<?php

class GheBay()
{
    private $idChuyenBay;
    private $idVe;
    private $ghe;

	public function __construct( $IdMayBay, $IdVe, $Ghe)
    {
        $this->idMayBay = $IdMayBay;
        $this->idVe = $IdVe;
        $this->ghe = $Ghe;
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
    
}

?>