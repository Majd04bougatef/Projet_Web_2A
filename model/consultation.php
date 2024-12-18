<?php
class consultation
{
    
    private  $date_conusltation = null;
    private ?string $description_conultation = null;
    private ?string $symptomes = null;
    private ?string $prescription_consultation = null;
    private ?string $examen_comp = null;
    private ?int $isdelete = null;
    private ?int $id_r = null;
    private ?string $id_m = null;
    public function __construct( $d, $desc, $s, $pres,$examen,$isdelete,$id_r,$id_m)
    {
        
        $this->date_conusltation = $d;
        $this->description_conultation = $desc;
        $this->symptomes = $s;
        $this->prescription_consultation = $pres;
        $this->examen_comp = $examen;
        $this->isdelete = $isdelete; 
        $this->id_r = $id_r; 
        $this->id_m = $id_m;
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
     * Get and set the value of description
     */
    public function getDescription_conultation()
    {
        return $this->description_conultation;
    }

    public function setDescription_conultation($description_conultation)
    {
        $this->description_conultation = $description_conultation;
    }


    /**
     * Get and set the value of symptomes
     */
    public function getSymptomes()
    {
        return $this->symptomes;
    }

    public function setSymptomes($symptomes)
    {
        $this->symptomes = $symptomes;
    }


    /**
     * Get and set the value of prescription
     */
    public function getPrescription_conultation()
    {
        return $this->prescription_consultation;
    }

    public function setPrescription_consultation($prescription_consultation)
    {
        $this->prescription_consultation = $prescription_consultation;
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


   
    /**
     * Get and set the value of isdelete
     */
    public function getisdelete()
    {
        return $this->isdelete;
    }

    public function setisdelete($isdelete)
    {
        $this->isdelete = $isdelete;
    }


    /**
     * Get and set the value of id__r
     */
    public function getId_r()
    {
        return $this->id_r;
    }

    public function setid_r($id_r)
    {
        $this->id_r = $id_r;
    }


    /**
     * Get and set the value of id_m
     */
    public function getId_m()
    {
        return $this->id_m;
    }

    public function setid_m($id_m)
    {
        $this->id_m = $id_m;
    }
}
