<?php
class Comment
{
    private $idCom;
    private $id_b;
    private $dateCommentaire;
    private $descCommentaire;

    // Constructor
    public function __construct($id_Com,$id_b, $dateCommentaire, $descCommentaire)
    {
        $this->idCom = $id_Com;
        $this->id_b = $id_b;
        $this->dateCommentaire = $dateCommentaire;
        $this->descCommentaire = $descCommentaire;
    }

    public function getIdCom()
    {
        return $this->idCom;
    }

    public function getDescCommentaire()
    {
        return $this->descCommentaire;
    }

    /**
     * Set the value of descCommentaire
     *
     * @return self
     */
    public function setDescCommentaire($descCommentaire)
    {
        $this->descCommentaire = $descCommentaire;

        return $this;
    }

    /**
     * Get the value of dateCommentaire
     */
    public function getDateCommentaire()
    {
        return $this->dateCommentaire;
    }

    /**
     * Set the value of dateCommentaire
     *
     * @return self
     */
    public function setDateCommentaire($dateCommentaire)
    {
        $this->dateCommentaire = $dateCommentaire;

        return $this;
    }
    public function getIdB()
    {
        return $this->id_b;
    }

    public function setIdB($id_b)
    {
        $this->id_b = $id_b;
        return $this;
    }
}
?>