<?php

class LoaiMayBay
{
    private $id;
    private $ten;
    private $gheThuong;
    private $gheThuongGia;
    private $gheTietKiem;

    public function __construct($Id, $Ten, $GheThuong, $GheThuongGia, $GheTietKiem)
	{
        $this->id = $Id;
        $this->ten = $Ten;
        $this->gheThuong = $GheThuong;
        $this->gheThuongGia = $GheThuongGia;
        $this->gheTietKiem = $GheTietKiem;
    }
        
    public function getId()
	{
		return $this->id;
    }
    
	public function setId($Id)
	{
		$this->id = $Id;
    }
    
    public function getTen()
	{
		return $this->ten;
    }
    
	public function setTen($Ten)
	{
		$this->ten = $Ten;
    }
    
    public function getGheThuong()
	{
		return $this->gheThuong;
    }
    
	public function setGheThuong($GheThuong)
	{
		$this->gheThuong = $GheThuong;
    }

    public function getGheThuongGia()
	{
		return $this->gheThuongGia;
    }
    
	public function setGheThuongGia($GheThuongGia)
	{
		$this->gheThuongGia = $GheThuongGia;
    }

    public function getGheTietKiem()
	{
		return $this->gheTietKiem;
    }
    
	public function setGheTietKiem($GheTietKiem)
	{
		$this->gheTietKiem = $GheTietKiem;
    }
}

?>