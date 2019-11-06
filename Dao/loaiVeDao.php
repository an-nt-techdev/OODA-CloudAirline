<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entity/loaiVe.php";

class LoaiVeDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getAllLoaiVe()
	{
        $result = $this->runQuery("SELECT *	FROM loaive");
        
        $LoaiVeList = array();
		while ($row = $result->fetch_assoc())
		{
			$LoaiVe = new LoaiVe(
                $row['id'],
                $row['ten'],
                $row['phanTram']
            );
			array_push($LoaiVeList, $LoaiVe);
		}
		$result->free();
		
		return $LoaiVeList;
    }
  
}

?>