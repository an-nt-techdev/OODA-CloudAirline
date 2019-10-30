<?php

class ChuyenBay()
{
    private $id;
    private $idMayBay;
    private $diemDi;
    private $diemDen;
    private $gioBay;

    public function __construct($Id, $IdMayBay, $DiemDi, $DiemDen, $GioBay)
    {
        $this->id = $Id;
        $this->idMayBay = $IdMayBay;
        $this->diemDi = $DiemDi;
        $this->diemDen = $DiemDen;
        $this->gioBay = $GioBay;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($Id)
    {
        $this->id = $Id;
    }

    public function getIdMayBay()
    {
        return $this->idMayBay;
    }

    public function setIdMayBay($IdMayBay)
    {
        $this->idMayBay = $IdMayBay;
    }

    public function getDiemDi()
    {
        return $this->diemDi;
    }

    public function setDiemDi($DiemDi)
    {
        $this->diemDi = $DiemDi;
    }

    public function getDiemDen()
    {
        return $this->diemDen;
    }

    public function setDiemDen($DiemDen)
    {
        $this->diemDen = $DiemDen;
    }

    public function getGioBay()
    {
        return $this->gioBay;
    }

    public function setGioBay($GioBay)
    {
        $this->gioBay = $GioBay;
    }
    
}

?>