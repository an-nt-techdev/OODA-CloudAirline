<?php

class SanBay()
{
    private $id;
    private $tenThanhPho;

	public function __construct( $Id, $TenThanhPho)
	{
		$this->id = $Id;
		$this->idtenThanhPho = $TenThanhPho;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($Id)
	{
		$this->id = $Id;
	}

	public function getTenThanhPho()
	{
		return $this->tenThanhPho;
	}

	public function setTenThanhPho($TenThanhPho)
	{
		$this->tenThanhPho = $TenThanhPho;
	}
    
}

?>