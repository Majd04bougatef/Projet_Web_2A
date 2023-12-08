<?php
include '../controller/reclamationC.php';




if (isset($_GET["id_r"])) {
    $idToDelete = $_GET["id_r"];

    $d = new reclamationC();
    $d->supprimer($idToDelete);
    header('Location:afficherReclamation.php');
} 
else 
{
    echo "Invalid request.";
}


?>