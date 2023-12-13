<?php
class categorie
{
    private ?int $idcat = null;
    private ?string $catrdv = null;

    public function __construct($id, $cat)
    {
        $this->idcat = $id;
        $this->catrdv = $cat;
    }

    public function getIdCat()
    {
        return $this->idcat;
    }

    public function setIdCat($idcat)
    {
        $this->idcat = $idcat;
        return $this;
    }

    public function getCatRdv()
    {
        return $this->catrdv;
    }

    public function setCatRdv($catrdv)
    {
        $this->catrdv = $catrdv;
        return $this;
    }
}

?>