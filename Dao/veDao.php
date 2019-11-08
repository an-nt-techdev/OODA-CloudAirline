<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entity/ve.php";

class VeDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getVeById($Id)
	{
		$result = $this->runQuery("SELECT *	FROM ve WHERE id = '{$Id}'");
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
            $row['ngayDi1'],
            $row['ngayDi2'],
            $row['nguoiLon'],
            $row['treEm']
        );
    }
    
    public function insertVe($Ve)
	{
		return $this->runQuery(
			"INSERT INTO ve(id, cmndKhachHang, tenKhachHang, sdtKhachHang, diaChiKhachHang, kieuVe, loaiVe,
                            diemDi, diemDen, ngayDi1, ngayDi2, nguoiLon, treEm) 
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
                '{$Ve->getNgayDi1()}',
                '{$Ve->getNgayDi2()}',
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
                ngayDi1 = '{$Ve->getNgayDi1()}',
                ngayDi2 = '{$Ve->getNgayDi2()}',
                nguoiLon = '{$Ve->getNguoiLon()}',
                treEm = '{$Ve->getTreEm()}',
			WHERE id = {$Ve->getId()}"
		);
    }
    
	public function deleteVe($ID)
	{
        $this->runQuery("DELETE FROM trangthaive WHERE idVe = '{$ID}'");
        $this->runQuery("DELETE FROM ghebay WHERE idVe = '{$ID}'");
        $this->runQuery("DELETE FROM ve WHERE id = '{$ID}'");
	}
}

?>