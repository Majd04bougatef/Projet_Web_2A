<?php
class consultation
{
    private ?string $examen_comp = null;
    private ?DateTime $date_conusltation = null;
    
    
    

    public function __construct($examen, $d)
    {
        $this->examen_comp = $examen;
        $this->date_conusltation = $d; 
    }

  

    /**
     * Get and set the value of date
     */
    public function getDate_consultation()
    {
        return $this->date_conusltation;
    }

    public function setDate_conultation($date_conusltation)
    {
        $this->date_conusltation = $date_conusltation;
    }

    /**
     * Get and set the value of Examen
     */
    public function getExamen()
    {
        return $this->examen_comp;
    }

    public function setExamen($examen_comp)
    {
        $this->examen_comp = $examen_comp;
    }

}
