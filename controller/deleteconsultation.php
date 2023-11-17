<?php
    include '../controller/consultationR.php';

    $consult = new consultationfunction();

    if (isset($_GET['id_c'])) {
        $id_c = $_GET['id_c'];
        $consult->deleteConsult($id_c);
        echo '<center><h1><b>Consultation Supprimer</b></h1></center>';
        exit();
    } else {
        echo "Consultation ID not provided.";
    }
?>