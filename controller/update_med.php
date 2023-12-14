<?php
session_start();
include '../controller/userC.php';

    $userC = new userC();

    if($_POST['current_password']==''){
        $pass=$_SESSION['password'];
    }
    else{
        $pass=$_POST['new_password'];
    }


    $userC->update_med( $_POST['id'],$_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['tel'],$_POST['mail'],$_POST['diplome'] , $_POST['lieu_cabinet'],$pass)    ;
 
    echo '<script>window.location.href = "../view/menu_consultation_medecin.php";</script>';

?>
