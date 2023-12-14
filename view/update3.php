<?php
include '../controller/rdvC.php';
session_start();
$rendezvous = new rdvC();
$list = $rendezvous->updaterdv($_POST["date_rdv"],$_POST["id_rdv"]);


if (substr($_SESSION['user_id'], 0, 1)=='M')
    echo '<script>window.location.href = "../controller/afficher_liste_rdv_pat.php";</script>';
else if (substr($_SESSION['user_id'], 0, 1)=='A')
    echo '<script>window.location.href = "../controller/afficher_liste_rdv_admin.php";</script>';
else 
    echo '<script>window.location.href = "../controller/afficher_liste_rdv.php";</script>';
?>