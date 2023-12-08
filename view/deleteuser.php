<?php
session_start();
include '../Controller/userc.php';
$userC = new userC();
$userC->deleteuser($_GET["id_user"]);
header('Location:pagel_login_create.php');
?>