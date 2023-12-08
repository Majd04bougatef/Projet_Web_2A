<?php

class ParticipantModel
{
    protected $id;
    protected $nom;
    protected $email;
    protected $idEvent;

    public function __construct($id, $nom, $email, $idEvent)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->idEvent = $idEvent;
    }

    // Méthodes Getter

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }
}
?>
