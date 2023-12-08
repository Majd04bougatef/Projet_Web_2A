<?php

class reponse
{
    private ?int $id_rep = null;
    private ?string $reponse = null;
    private ?string $date_reponse = null;
    private ?int $id_rec = null;


    public function __construct($reponse, $date_reponse, $id_rec)
    {
        $this->reponse = $reponse;
        $this->date_reponse = $date_reponse;
        $this->id_rec = $id_rec;
    }

    
    public function getId()
    {
        return $this->id_rep;
    }

    
    public function getReponse()
    {
        return $this->reponse;
    }

    
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    
    public function getDate()
    {
        return $this->date_reponse;
    }

    
    public function setDate($date_reponse)
    {
        $this->date_reponse = $date_reponse;

        return $this;
    }


    public function getIDReclamation()
    {
        return $this->id_rec;
    }

    
    public function setIDReclamation($id_rec)
    {
        $this->id_rec = $id_rec;

        return $this;
    }
}
