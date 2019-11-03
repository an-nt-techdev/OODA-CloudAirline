<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entities/ve.php";

class VeDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getVeById($Id)
	{
		$result = $this->runQuery("SELECT *	FROM ve WHERE id = {$Id}");
		$row = $result->fetch_assoc();
		return new Ve(
			$row['id'],
			$row['cmndKhachHang'],
			$row['tenKhachHang'],
			$row['sdtKhachHang'],
            $row['diaChiKhachHang'],
            $row['kieuVe'],
            $row['loaiVe'],
            $row['diemDi'],
            $row['diemDen'],
            $row['ngayGioDi1'],
            $row['ngayGioDi2'],
            $row['mayBay1'],
            $row['mayBay2'],
            $row['nguoiLon'],
            $row['treEm']
        );
    }
    
    public function insertVe($Ve)
	{
		return $this->runQuery(
			"INSERT INTO ve(id, cmndKhachHang, tenKhachHang, sdtKhachHang, diaChiKhachHang, kieuVe, loaiVe,
                            diemDi, diemDen, ngayGioDi1, ngayGioDi2, mayBay1, mayBay2, nguoiLon, treEm) 
			VALUE (
				'{$Ve->getId()}',
				'{$Ve->getCmndKhachHang()}',
                '{$Ve->getTenKhachHang()}',
                '{$Ve->getSdtKhachHang()}',
                '{$Ve->getDiaChiKhachHang()}',
                '{$Ve->getKieuVe()}',
                '{$Ve->getLoaiVe()}',
                '{$Ve->getDiemDi()}',
                '{$Ve->getDiemDen()}',
                '{$Ve->getNgayGioDi1()}',
                '{$Ve->getNgayGioDi2()}',
                '{$Ve->getMayBay1()}',
                '{$Ve->getMayBay2()}',
                '{$Ve->getNguoiLon()}',
                '{$Ve->getTreEm()}',
			)"
		);
    }
    
	public function updateVe($Ve)
	{
		return $this->runQuery(
			"UPDATE ve
			SET cmndKhachHang = '{$Ve->getCmndKhachHang()}',
                tenKhachHang = '{$Ve->getTenKhachHang()}',
                sdtKhachHang = '{$Ve->getSdtKhachHang()}',
                diaChiKhachHang = '{$Ve->getDiaChiKhachHang()}',
                kieuVe = '{$Ve->getKieuVe()}',
                loaiVe = '{$Ve->getLoaiVe()}',
                diemDi = '{$Ve->getDiemDi()}',
                diemDen = '{$Ve->getDiemDen()}',
                ngayGioDi1 = '{$Ve->getNgayGioDi1()}',
                ngayGioDi2 = '{$Ve->getNgayGioDi2()}',
                mayBay1 = '{$Ve->getMayBay1()}',
                mayBay2 = '{$Ve->getMayBay2()}',
                nguoiLon = '{$Ve->getNguoiLon()}',
                treEm = '{$Ve->getTreEm()}',
			WHERE id = {$Ve->getId()}"
		);
    }
    
	public function deleteVe($ID)
	{
        $this->runQuery("DELETE FROM trangthaive WHERE idVe = {$ID}");
        $this->runQuery("DELETE FROM ghebay WHERE idVe = {$ID}");
        $this->runQuery("DELETE FROM ve WHERE id = {$ID}");
	}
}

?>