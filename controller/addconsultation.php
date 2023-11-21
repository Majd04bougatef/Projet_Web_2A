
<?php

    include_once 'consultationR.php';
    //include '../view/rendez-vous.php';

    $consult = null;

    $consultR = new consultationfunction();
    
    $isdelete =0;
    $id_m='MM12345676';


    if (isset($_POST["date"]) || isset($_POST["description"]) || isset($_POST["motif"]) || isset($_POST["symptomes"]) || isset($_POST['prescription']) || isset($_POST['examen']) ) {
        $consult = new consultation($_POST['date'], $_POST['description'], $_POST['symptomes'], $_POST['prescription'], $_POST['examen'], $isdelete, $_POST['idrdv'], $id_m );    
        
        $consultR->addConsultation($consult);
    }
?>