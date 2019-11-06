<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entities/chuyenBay.php";

class ChuyenBayDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getChuyenBayById($Id)
	{
		$result = $this->runQuery("SELECT *	FROM chuyenbay WHERE id = {$Id}");
		$row = $result->fetch_assoc();
		return new ChuyenBay(
			$row['id'],
            $row['idMayBay'],
            $row['diemDi'],
            $row['diemDen'],
            $row['gioBay'],
            $row['khoangCach']
        );
    }
  
}

?>