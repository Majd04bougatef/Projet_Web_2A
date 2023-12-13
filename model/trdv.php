<?php


class rendezvous
{
    private ?int $idrdv = null;
    private  $rdv_date = null;
    private ?int $idcat = null;
    private ?string $idusr = null;
    private $debrdv= null;
    private $finrdv=null;

    public function __construct($idrdv, $rdv_date, $idcat, $idusr,$debrdv,$finrdv)
    {
        $this->idrdv = $idrdv;
        $this->rdv_date = $rdv_date;
        $this->idcat = $idcat;
        $this->idusr = $idusr;
        $this->debrdv=$debrdv;
        $this->finrdv=$finrdv;
    }

    public function getIdRdv()
    {
        return $this->idrdv;
    }

    public function setIdrdv($idrdv)
    {
        $this->idrdv = $idrdv;
        return $this;
    }

    public function getrdv_date()
    {
        return $this->rdv_date;
    }

    public function setrdv_date($rdv_date)
    {
        $this->rdv_date = $rdv_date;
        return $this;
    }

    public function getidcat()
    {
        return $this->idcat;
    }

    public function setidcat($idcat)
    {
        $this->idcat = $idcat;
        return $this;
    }

    public function getidusr()
    {
        return $this->idusr;
    }

    public function setidusr($idusr)
    {
        $this->idusr = $idusr;
        return $this;
    }
    public function getdebrdv()
    {
        return $this->debrdv;
    }

    public function setdebrdv($debrdv)
    {
        $this->debrdv = $debrdv;
        return $this;
    }

    public function getfinrdv()
    {
        return $this->finrdv;
    }

    public function setfinrdv($finrdv)
    {
        $this->finrdv = $finrdv;
        return $this;
    }

}



?>
 