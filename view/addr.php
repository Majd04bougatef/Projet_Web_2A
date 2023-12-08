<?php
include_once '../controller/rdvC.php';
$date = $dateDeb = $dateFin = "";

$date = $_POST["date"] ?? "";
$dateDeb = $_POST["date_deb"] ?? "";
$dateFin = $_POST["date_fin"] ?? "";
$id_user = $_POST["id_user"] ?? "";



$rdvc=new rdvC();
if(   isset($date)|| isset($dateDeb)||  isset($dateFin)|| isset($_POST["catrdv"])|| isset($id_user) ){
    $r= new rendezvous(NULL,$date,isset($_POST['idcat']),'PA12345678',$dateDeb,$dateFin);

   
    $rdvc->addrdv($r);
  }
  else{
    echo "eror";
  }



// Le reste de votre code pour traiter les données
?> 