<?php
include '../controller/rdvC.php';
$rendezvous = new rdvC();
$list = $rendezvous->updaterdv($_POST["date_rdv"],$_POST["id_rdv"]);

echo '<script>window.location.href = "../controller/afficher_list_rdv_pat_admin.php";</script>';

?>