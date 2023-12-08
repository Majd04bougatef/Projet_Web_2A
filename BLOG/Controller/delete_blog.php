<?php
include '../Controller/blogC.php';
$blogC = new blogC();
$blogC->deleteblog($_GET["id_b"]);

header('Location:listeblog.php');
?>
