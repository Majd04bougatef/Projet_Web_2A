

<?php
    include_once 'config.php';
    include '../controller/consultationR.php';

    

    if ($_POST['symptomes']=='description') {
        $sql = "UPDATE consultation SET description_consultation=:desc WHERE id_c=:id";
        $db = config::getConnexion();
        try {
            $up = $db->prepare($sql);
            $up->execute(['desc' => $_POST['age'], 'id' => '40']);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        echo '<center><h1><b>Consultation Modifier</b></h1></center>';
        exit();
    } 

    else if ($_POST['symptomes']=='motif') {
        $sql = "UPDATE consultation SET motif_consultation=:mot";
        $db = config::getConnexion();
        try {
            $up = $db->prepare($sql);
            $up->execute(['mot' => $_POST['age']]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        echo '<center><h1><b>Consultation Modifier</b></h1></center>';
        exit();
    } 

    else if ($_POST['symptomes']=='symptomes') {
        $sql = "UPDATE consultation SET symptomes_=:s";
        $db = config::getConnexion();
        try {
            $up = $db->prepare($sql);
            $up->execute(['s' => $_POST['age']]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        echo '<center><h1><b>Consultation Modifier</b></h1></center>';
        exit();
    } 

    else if ($_POST['symptomes']=='prescription') {
        $sql = "UPDATE consultation SET prescription_consultation=:pers";
        $db = config::getConnexion();
        try {
            $up = $db->prepare($sql);
            $up->execute(['pers' => $_POST['age']]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        echo '<center><h1><b>Consultation Modifier</b></h1></center>';
        exit();
    } 

    else if ($_POST['symptomes']=='examen') {
        $sql = "UPDATE consultation SET examen_consultation=:ex";
        $db = config::getConnexion();
        try {
            $up = $db->prepare($sql);
            $up->execute(['ex' => $_POST['age']]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        echo '<center><h1><b>Consultation Modifier</b></h1></center>';
        exit();
    } 
    
    else {
        echo "Consultation ID not provided.";
    }

?>