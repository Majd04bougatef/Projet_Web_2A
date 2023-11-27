<?php
class ordonnance
{
    
    private  $date = null;
    private ?string $examen = null;
    private ?int $id_c = null;

    public function __construct( $d,$ex,$id_c)
    {
        $this->date = $d;
        $this->examen = $ex;
        $this->id_c = $id_c;         
    }

  

    /**
     * Get and set the value of date
     */
    public function getDate_Ordonnance()
    {
        return $this->date;
    }

    public function setDate_Ordonnance($d)
    {
        $this->date = $d;
    }

    /**
     * Get and set the value of examen
     */
    public function getExamen()
    {
        return $this->examen;
    }

    public function setExamen($examen)
    {
        $this->examen = $examen;
    }

    /**
     * Get and set the value of id_c
     */
    public function getId_c()
    {
        return $this->id_c;
    }

    public function setId_c($id_c)
    {
        $this->id_c = $id_c;
    }

}
