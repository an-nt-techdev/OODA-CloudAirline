<?php

class TrangThaiVe
{
    private $idVe;
    private $trangThai;
    private $email;

	public function __construct( $IdVe, $TrangThai, $Email)
    {
        $this->idVe = $IdVe;
        $this->trangThai = $TrangThai;
        $this->email = $Email;
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

    public fucntion getEmail()
    {
        return $this->email;
    }

    public function setEmail($Email)
    {
        $this->email = $Email;
    }
    
}

?>