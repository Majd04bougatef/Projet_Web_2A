
<?php

    include_once 'consultationR.php';
    //include '../view/rendez-vous.php';

    $consult = null;

    $consultR = new consultationfunction();
    
    if (isset($_POST["date"]) || isset($_POST["description"]) || isset($_POST["motif"]) || isset($_POST["symptomes"]) || isset($_POST['prescription']) || isset($_POST['examen']) || isset($_POST['duree'])) {
        $consult = new consultation(
            $_POST['date'],
            $_POST['description'],
            $_POST['symptomes'],
            $_POST['prescription'],
            $_POST['examen'],
    
            $_POST['idrdv']
        );        $consultR->addConsultation($consult);
        echo '<center><b><h2>consultation enregistree avec succes</h2><b></center>';
    }
?>