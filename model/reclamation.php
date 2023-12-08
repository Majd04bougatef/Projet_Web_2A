<?php

class reclamation
{
    private ?int $id_r = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $etat = null;
    private ?string $sujet_rec = null;
    private ?string $desc_rec = null;
    private ?string $date_rec = null;


    public function __construct($nom, $prenom, $etat, $sujet_rec, $desc_rec, $date_rec)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->etat = $etat;
        $this->sujet_rec = $sujet_rec;
        $this->desc_rec = $desc_rec;
        $this->date_rec = $date_rec;
    }

    
    public function getID()
    {
        return $this->id_r;
    }

    
    public function getDate()
    {
        return $this->date_rec;
    }

    
    public function setDate($date_rec)
    {
        $this->date_rec = $date_rec;

        return $this;
    }


    public function getNom()
    {
        return $this->nom;
    }

    
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEtat()
    {
        return $this->etat;
    }

    
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }


    public function getDescription()
    {
        return $this->desc_rec;
    }

    
    public function setDescription($desc_rec)
    {
        $this->desc_rec = $desc_rec;

        return $this;
    }    


    public function getSujet()
    {
        return $this->sujet_rec;
    }

    
    public function setSujet($sujet_rec)
    {
        $this->sujet_rec = $sujet_rec;

        return $this;
    }
    
}
