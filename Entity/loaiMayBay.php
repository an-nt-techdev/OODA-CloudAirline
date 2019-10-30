<?php

class LoaiMayBay()
{
    private $id;
    private $ten;
    private $gheThuong;
    private $gheThuongGia;
    private $gheLoaiNhat;

    public function __construct($Id, $Ten, $GheThuong, $GheThuongGia, $GheLoaiNhat)
	{
        $this->id = $Id;
        $this->ten = $Ten;
        $this->gheThuong = $GheThuong;
        $this->gheThuongGia = $GheThuongGia;
        $this->gheLoaiNhat = $GheLoaiNhat;
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

    public function getGheLoaiNhat()
	{
		return $this->gheLoaiNhat;
    }
    
	public function setGheLoaiNhat($GheLoaiNhat)
	{
		$this->gheLoaiNhat = $GheLoaiNhat;
    }
}

?>