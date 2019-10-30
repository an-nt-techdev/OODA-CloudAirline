<?php

class TrangThaiVe()
{
    private $idVe;
    private $trangThai;

	public function __construct( $IdVe, $TrangThai)
    {
        $this->idVe = $IdVe;
        $this->trangThai = $TrangThai;
    }

    public function getIdVe()
    {
        return $this->idVe;
    }

    public function setIdVe($IdVe)
    {
        $this->idVe = $IdVe;
    }

    public function getTrangThai()
    {
        return $this->trangThai;
    }

    public function setTrangThai($TrangThai)
    {
        $this->trangThai = $TrangThai;
    }
    
}

?>