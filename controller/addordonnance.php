<?php
    include_once '../controller/ordonnanceR.php';

    $ordR = new ordonnancefunction();
  
    if (isset($_POST["date"]) || isset($_POST["ex"]) || isset($_POST['id_c']) ) {
        $ord = new ordonnance($_POST['date'], $_POST['ex'], $_POST['id_c']);    
        $ordR->addOrdonnance($ord);
    }
?>
