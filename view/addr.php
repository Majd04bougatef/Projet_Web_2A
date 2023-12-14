<?php
include_once '../controller/rdvC.php';
$date = $dateDeb = $dateFin = "";

$date = $_POST["date"] ?? "";
$dateDeb = $_POST["dateDeb"] ?? "";
$dateFin = $_POST["dateFin"] ?? "";
$id_user = $_POST["id_user"] ?? "";



if ($dateDeb==12){
  $dateFin=1;
}
else if ($dateDeb>12){
  $dateDeb=$dateDeb-12;
  $dateFin=$dateDeb+1;
}





$rdvc=new rdvC();
if(   isset($date)|| isset($dateDeb)||  isset($dateFin)|| isset($_POST["catrdv"])|| isset($id_user) ){
    $r= new rendezvous(NULL,$date,isset($_POST['idcat']),'PA12345678',$dateDeb,$dateFin);

   
    $rdvc->addrdv($r);

    echo '<script>window.location.href = "../view/calendar_rdv.php";</script>';
  }
  else{
    echo "eror";
  }

?> 