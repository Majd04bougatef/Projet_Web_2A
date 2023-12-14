<?php
include '../controller/reponseC.php';


$d = new reponseC();
$d->supprimer($_GET["id_rep"]);
header('Location:afficherReponse1.php');


?>