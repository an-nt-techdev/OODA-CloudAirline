<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entity/gheBay.php";

class GheBayDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getGheBayByIdVe($IdVe)
	{
		$result = $this->runQuery("SELECT *	FROM gheBay WHERE idVe = '{$IdVe}'");
		$row = $result->fetch_assoc();
		return new GheBay(
			$row['idChuyenBay'],
			$row['idVe'],
			$row['ghe'],
			$row['ngaybay']
        );
    }

    public function getGheBayByIdChuyenBayAndNgayBay($IdChuyenBay, $NgayBay)
	{
		$result = $this->runQuery("SELECT *	FROM gheBay WHERE idChuyenBay = '{$IdChuyenBay}' AND ngayBay = '{$NgayBay}'");
		
		$GheBayList = array();
		while ($row = $result->fetch_assoc())
		{
			$GheBay = new GheBay(
                $row['idChuyenBay'],
				$row['idVe'],
				$row['ghe'],
				$row['ngayBay']
            );
			array_push($GheBayList, $GheBay);
		}
		$result->free();
		
		return $GheBayList;
    }
    
    public function insertGheBay($GheBay)
	{
		$a="INSERT INTO ghebay(idChuyenBay,idVe,ghe,ngaybay) VALUE ('{$GheBay->getIdChuyenBay()}','{$GheBay->getIdVe()}','{$GheBay->getGhe()}','{$GheBay->getNgayBay()}') ";
		return $this->runQuery($a);
    }
    
	// public function updateGheBay($GheBay)
	// {
	// 	return $this->runQuery(
	// 		"UPDATE ghebay
	// 		SET 
	// 		}"
	// 	);
    // }
    
	public function deleteGheBay($ID)
	{
        $this->runQuery("DELETE FROM gheBay WHERE idVe = '{$ID}'");
	}
}

?>