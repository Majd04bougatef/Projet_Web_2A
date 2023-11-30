<?php

class Comment
{
    private $id_commentaire;
    private $contenu;
    private $date_commentaire;
    private $id_e; // ID de l'événement
    private $id_user; // ID de l'utilisateur

    public function __construct($id_commentaire, $contenu, $date_commentaire, $id_e, $id_user)
    {
        // Si l'ID est null, la base de données doit générer un nouvel ID
        $this->id_commentaire = ($id_commentaire === null) ? null : (int)$id_commentaire;
        $this->contenu = $contenu;
        $this->date_commentaire = $date_commentaire;
        $this->id_e = (int)$id_e;
        $this->id_user = $id_user;
    }

    // Getters and setters
    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function getDateCommentaire()
    {
        return $this->date_commentaire;
    }

    public function getIdE()
    {
        return $this->id_e;
    }

    public function setIdE($id_e)
    {
        $this->id_e = $id_e;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }
}

?>
