<?php

class MayBay()
{
    private $id;
    private $idLoaiMayBay;

	public function __construct( $Id, $IdLoaiMayBay)
	{
		$this->id = $Id;
		$this->idLoaiMayBay = $IdLoaiMayBay;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($Id)
	{
		$this->id = $Id;
	}

	public function getIdLoaiMayBay()
	{
		return $this->idLoaiMayBay;
	}

	public function setIdLoaiMayBay($IdLoaiMayBay)
	{
		$this->idLoaiMayBay = $IdLoaiMayBay;
	}
    
}

?>