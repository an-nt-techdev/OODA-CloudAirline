<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entity/sanBay.php";

class SanBayDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    
    public function getAllSanBay()
	{
        $result = $this->runQuery("SELECT *	FROM sanbay");
        
        $SanBayList = array();
		while ($row = $result->fetch_assoc())
		{
			$SanBay = new SanBay(
                $row['id'],
                $row['tenThanhPho']
            );
			array_push($SanBayList, $SanBay);
		}
		$result->free();
		
		return $SanBayList;
	}
	

	public function getIdByTenSanBay($ten)
	{
		$result = $this->runQuery("SELECT * FROM sanbay where tenThanhPho='{$ten}'");		
		$row= $result->fetch_assoc();
		return new SanBay(
			$row['id'],
			$row['tenThanhPho']
		);
	}
}

?>