<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entity/chuyenBay.php";

class ChuyenBayDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getChuyenBayByDiaDiem($DiemDi, $DiemDen)
	{
        $result = $this->runQuery("SELECT *	FROM chuyenbay WHERE diemDi = {$DiemDi} AND diemDen = {$DiemDen}");
        
        $ChuyenBayList = array();
		while ($row = $result->fetch_assoc())
		{
			$ChuyenBay = new ChuyenBay(
                $row['id'],
                $row['idMayBay'],
                $row['diemDi'],
                $row['diemDen'],
                $row['gioBay'],
                $row['khoangCach']
            );
			array_push($ChuyenBayList, $ChuyenBay);
		}
		$result->free();
		
		return $ChuyenBayList;
    }
  
}

?>