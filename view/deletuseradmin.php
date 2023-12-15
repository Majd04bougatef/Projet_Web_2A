<?php
session_start();
include '../Controller/userC.php';
$userC = new userC();
$userC->deleteuser($_GET["id_user"]);
echo '<script>window.location.href = "../view/listeuser.php";</script>';
?>