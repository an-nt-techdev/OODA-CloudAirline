<?php

class LoaiVe
{
    private $id;
    private $ten;
    private $phanTram;
    
    public function __construct($Id, $Ten, $PhanTram)
    {
        $this->id = $Id;
        $this->ten = $Ten;
        $this->phanTram = $PhanTram;
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

    public function getPhanTram()
    {
        return $this->phanTram;
    }

    public function setPhanTram($PhanTram)
    {
        $this->phanTram = $PhanTram;
    }
    
}

?>