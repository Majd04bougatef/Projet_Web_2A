<?php

class Event
{
    private ?int $id_e ;
    private ?string $titre_event = null;
    private ?string $sujet_event = null;
    private ?string $desc_event = null;
    private ?string $lieu_event = null;
    private ?string $date_debut_event = null;
    private ?string $date_fin_event = null;
    private ?int $capacite = null;
    private ?string $id_user = null;
    private $image;


    public function __construct($id_e, $titre_event, $sujet_event, $desc_event, $lieu_event, $date_debut_event, $date_fin_event, $capacite, $id_user,$image)
    {
        $this->id_e = $id_e;
        $this->titre_event = $titre_event;
        $this->sujet_event = $sujet_event;
        $this->desc_event = $desc_event;
        $this->lieu_event = $lieu_event;
        $this->date_debut_event = $date_debut_event;
        $this->date_fin_event = $date_fin_event;
        $this->capacite = $capacite;
        $this->id_user = $id_user;
        $this->image = $image;
    } 
    

    public function getId_e()
    {
        return $this->id_e;
    }

    public function getTitreEvent()
    {
        return $this->titre_event;
    }

    public function getSujetEvent()
    {
        return $this->sujet_event;
    }

    public function getDescEvent()
    {
        return $this->desc_event;
    }

    public function getLieuEvent()
    {
        return $this->lieu_event;
    }

    public function getDateDebutEvent()
    {
        return $this->date_debut_event;
    }

    public function getDateFinEvent()
    {
        return $this->date_fin_event;
    }

    public function getCapacite()
    {
        return $this->capacite;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }
    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }
    
    
}


?>
