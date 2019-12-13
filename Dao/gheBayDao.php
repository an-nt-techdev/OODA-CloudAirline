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

    public function getGheByIdChuyenBayAndNgayBay($IdChuyenBay, $NgayBay)
	{
		$result = $this->runQuery("SELECT *	FROM gheBay WHERE idChuyenBay = '{$IdChuyenBay}' AND ngayBay = '{$NgayBay}'");
		
		$GheBayList = array();
		while ($row = $result->fetch_assoc())
		{
			$GheBay = $row['ghe'];
			array_push($GheBayList, $GheBay);
		}
		$result->free();
		
		return $GheBayList;
    }
    
    public function insertGheBay($GheBay)
	{
		echo $GheBay->getIdChuyenBay()." ".$GheBay->getIdVe()." ".$GheBay->getGhe()." ".$GheBay->getNgayBay();
		$a="INSERT INTO ghebay(idChuyenBay,idVe,ghe,ngayBay) VALUE ('{$GheBay->getIdChuyenBay()}','{$GheBay->getIdVe()}',{$GheBay->getGhe()},'{$GheBay->getNgayBay()}') ";
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