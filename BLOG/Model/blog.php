<?php 
class Blog {

    private ?int $id_b = null; 
    private ?string $titre_blog = null;
    private ?string $sujet_blog = null;
    private ?string $desc_blog = null;
    private  $date_blog = null;
    private ?string $id_user = null;
   
 public function __construct($id = null, $titre, $sujet, $desc, $date,$id_user)
    {
        $this->id_b = $id;
        $this->titre_blog = $titre;
        $this->sujet_blog = $sujet;
        $this->desc_blog = $desc;
        $this->date_blog = $date;
        $this->id_user = $id_user;
    }
 /**
     * Get the value of idblog
     */
    public function getId_B()
    {
        return $this->id_b;
    }
 /**
     * Get the value of titre_blog
     */
    public function getTitreBlog()
    {
        return $this->titre_blog;
    }

    /**
     * Set the value of titre_blog
     *
     * @return  self
     */
    public function settitre_blog($titre_blog)
    {
        $this->titre_blog= $titre_blog;

        return $this;
    }
/**
     * Get the value of sujet_blog
     */
    public function getSujetBlog()
    {
        return $this->sujet_blog;
    }

    /**
     * Set the value of sujet_blog
     *
     * @return  self
     */
    public function setSujetBlog($sujet_blog)
    {
        $this->sujet_blog = $sujet_blog;

        return $this;
    }

    /**
     * Get the value of desc_blog
     */
    public function getDescBlog()
    {
        return $this->desc_blog;
    }

    /**
     * Set the value of desc_blog
     *
     * @return  self
     */
    public function setDescBlog($desc_blog)
    {
        $this->desc_blog = $desc_blog;

        return $this;
    }

    /**
     * Get the value of date_blog
     */
    public function getDateBlog()
    {
        return $this->date_blog;
    }

    /**
     * Set the value of date_blog
     *
     * @return  self
     */
    public function setDateBlog($date_blog)
    {
        $this->date_blog = $date_blog;

        return $this;
    }


    /**
     * 
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * 
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->date_blog = $id_user;

        return $this;
    }
}
?>