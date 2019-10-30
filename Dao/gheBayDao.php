<?php 

require_once SITE_ROOT."/Config/DBCon.php";
require_once SITE_ROOT."/Entities/gheBay.php";

class GheBayDao extends DBConnection
{
    // public function __construct() 
	// {
	// 	parent::__construct();
    // }
    
    // public function getGheBayByIdVe($IdVe)
	// {
	// 	$result = $this->runQuery("SELECT *	FROM gheBay WHERE idVe = {$IdVe}");
	// 	$row = $result->fetch_assoc();
	// 	return new GheBay(
	// 		$row['idVe'],
	// 		$row['trangThai']
    //     );
    // }
    
    // public function insertGheBay($GheBay)
	// {
	// 	return $this->runQuery(
	// 		"INSERT INTO gheBay(idVe, trangThai) 
	// 		VALUE (
	// 			'{$GheBay->getIdVe()}',
	// 			'{$GheBay->getTrangThai()}'
	// 		)"
	// 	);
    // }
    
	// public function updateGheBay($GheBay)
	// {
	// 	return $this->runQuery(
	// 		"UPDATE gheBay
	// 		SET trangThai = '{$GheBay->getTrangThai()}'
	// 		WHERE idVe = {$GheBay->getIdVe()}"
	// 	);
    // }
    
	// public function deleteGheBay($ID)
	// {
    //     $this->runQuery("DELETE FROM gheBay WHERE idVe = {$ID}");
	// }
}

?>