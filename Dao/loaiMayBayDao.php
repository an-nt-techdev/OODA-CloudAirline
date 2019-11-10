<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entity/loaiMayBay.php";

class LoaiMayBayDao extends DBConnection
{
    public function __construct() 
	{
		parent::__construct();
    }
    public function getLoaiMayBayById($id){
        $result = $this->runQuery("SELECT *	FROM loaive where id='{$id}'");
        $row= $result->fetch_assoc();
        return new LoaiMayBay(
            $row['$id'],
            $row['ten'],
            $row['gheThuong'],
            $row['gheThuongGia'],
            $row['gheTietKiem']
        );
    }
}

?>