

<?php

    include '../controller/consultationR.php';

    $cons = new consultationfunction();

    $cons->UpdateConsult($_POST['id_c'],$_POST['description'],$_POST['symptomes'],$_POST['prescription'],$_POST['examen']);
    
?>