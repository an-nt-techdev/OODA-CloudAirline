<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entities/trangThaiVe.php";

class TrangThaiVeDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getTrangThaiVeById($IdVe)
	{
		$result = $this->runQuery("SELECT *	FROM trangthaive WHERE idVe = {$IdVe}");
		$row = $result->fetch_assoc();
		return new TrangThaiVe(
			$row['idVe'],
			$row['trangThai']
        );
    }
    
    public function insertTrangThaiVe($TrangThaiVe)
	{
		return $this->runQuery(
			"INSERT INTO trangthaive(idVe, trangThai) 
			VALUE (
				'{$TrangThaiVe->getIdVe()}',
				'{$TrangThaiVe->getTrangThai()}'
			)"
		);
    }
    
	public function updateTrangThaiVe($TrangThaiVe)
	{
		return $this->runQuery(
			"UPDATE trangthaive
			SET trangThai = '{$TrangThaiVe->getTrangThai()}'
			WHERE idVe = {$TrangThaiVe->getIdVe()}"
		);
    }
    
	public function deleteTrangThaiVe($ID)
	{
        $this->runQuery("DELETE FROM trangthaive WHERE idVe = {$ID}");
	}
}

?>