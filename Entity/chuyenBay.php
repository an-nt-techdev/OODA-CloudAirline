<?php

class ChuyenBay()
{
    private $id;
    private $idMayBay;
    private $diemDi;
    private $diemDen;
    private $gioBay;
    private $khoangCach;

    public function __construct($Id, $IdMayBay, $DiemDi, $DiemDen, $GioBay, $KhoangCach)
    {
        $this->id = $Id;
        $this->idMayBay = $IdMayBay;
        $this->diemDi = $DiemDi;
        $this->diemDen = $DiemDen;
        $this->gioBay = $GioBay;
        $this->khoangCach = $KhoangCach;
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

    public function getKhoangCach()
    {
        return $this->khoangCach;
    }

    public function setKhoangCach($KhoangCach)
    {
        $this->khoangCach = $KhoangCach;
    }
    
}

?>