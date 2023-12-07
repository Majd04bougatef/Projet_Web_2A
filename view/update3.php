<?php
include '../controller/rdvC.php';
$rendezvous = new rdvC();
$list = $rendezvous->updaterdv($_POST["date_rdv"],$_POST["id_rdv"]);

?>