<?php

class Ve()
{
    private $id;
    private $cmndKhachHang;
    private $tenKhachHang;
    private $sdtKhachHang;
    private $diaChiKhachHang;
    private $kieuVe;
    private $diemDi;
    private $diemDen;
    private $ngayDi1;
    private $ngayDi2;
    private $nguoiLon;
    private $treEm;

    public function __construct( $Id, $CmndKhachHang, $TenKhachHang, $SdtKhachHang, $DiaChiKhachHang, $KieuVe, $DiemDi, $DiemDen, $NgayDi1, $NgayDi2, $NguoiLon, $TreEm)
    {
        $this->id = $Id;
        $this->cmndKhachHang = $CmndKhachHang;
        $this->tenKhachHang = $TenKhachHang;
        $this->sdtKhachHang = $SdtKhachHang;
        $this->diaChiKhachHang = $DiaChiKhachHang;
        $this->kieuVe = $KieuVe;
        $this->diemDi = $DiemDi;
        $this->diemDen = $DiemDen;
        $this->ngayDi1 = $NgayDi1;
        $this->ngayDi2 = $NgayDi2;
        $this->nguoiLon = $NguoiLon;
        $this->treEm = $TreEm;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($Id)
    {
        $this->id = $Id;
    }

    public function getCmndKhachHang()
    {
        return $this->cmndKhachHang;
    }

    public function setCmndKhachHang($CmndKhachHang)
    {
        $this->cmndKhachHang = $CmndKhachHang;
    }

    public function getTenKhachHang()
    {
        return $this->tenKhachHang;
    }

    public function setTenKhachHang($TenKhachHang)
    {
        $this->tenKhachHang = $TenKhachHang;
    }

    public function getSdtKhachHang()
    {
        return $this->sdtKhachHang;
    }

    public function setSdtKhachHang($SdtKhachHang)
    {
        $this->sdtKhachHang = $SdtKhachHang;
    }

    public function getDiaChiKhachHang()
    {
        return $this->diaChiKhachHang;
    }

    public function setDiaChiKhachHang($DiaChiKhachHang)
    {
        $this->diaChiKhachHang = $DiaChiKhachHang;
    }

    public function getKieuVe()
    {
        return $this->kieuVe;
    }

    public function setKieuVe($KieuVe)
    {
        $this->kieuVe = $KieuVe;
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

    public function getNgayDi1()
    {
        return $this->ngayDi1;
    }

    public function setNgayDi1($NgayDi1)
    {
        $this->ngayDi1 = $NgayDi1;
    }

    public function getNgayDi2()
    {
        return $this->ngayDi2;
    }

    public function setNgayDi2($NgayDi2)
    {
        $this->ngayDi2 = $NgayDi2;
    }

    public function getNguoiLon()
    {
        return $this->nguoiLon;
    }

    public function setNguoiLon($NguoiLon)
    {
        $this->nguoiLon = $NguoiLon;
    }

    public function getTreEm()
    {
        return $this->treEm;
    }

    public function setTreEm($TreEm)
    {
        $this->treEm = $TreEm;
    }
    
}

?>