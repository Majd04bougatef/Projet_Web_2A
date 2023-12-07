<?php
include '../controller/rdvC.php';

if (isset($_GET["id_rdv"])) {
    $rendezvous = new rdvC();
    $rendezvous->deleterdv($_GET["id_rdv"]);
    header('Location: listerdv.php');
    exit();
} else {
    echo 'Error: id_rdv not set.';
}
?>