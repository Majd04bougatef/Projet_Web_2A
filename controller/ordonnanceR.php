

<?php
include_once '../config.php';
include_once '../model/ordonnance.php';

class ordonnancefunction
{

    //Medecin
    
    public function list_Pat_consult($id)
    {
        $sql = "SELECT user.nom , user.prenom , user.age FROM user,rendezvous,consultation WHERE user.id_user = rendezvous.id_user and rendezvous.id_rdv = :id";
        $db = config::getConnexion();
        try {
            $liste = $db->prepare($sql);
            $liste->execute(['id' => $id]);

            $pat = $liste->fetch();
            return $pat;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function list_Med_consult($id)
    {
        $sql = "SELECT user.nom , user.prenom  FROM user,rendezvous WHERE user.id_user = rendezvous.id_med and rendezvous.id_rdv = :id and user.role='medecin'";
        $db = config::getConnexion();
        try {
            $liste = $db->prepare($sql);
            $liste->execute(['id' => $id]);

            $pat = $liste->fetch();
            return $pat;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function list_Medicament_consult($id)
    {
        $sql = "SELECT * FROM consultation WHERE id_rdv = :id ";
        $db = config::getConnexion();
        try {
            $liste = $db->prepare($sql);
            $liste->execute(['id' => $id]);

            $medicaments = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $medicaments;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addOrdonnance($ord)
    {
        $sql = "INSERT INTO `ordonnance` (`id_o`, `date`,`examen`,`id_c` ) VALUES (NULL, :date, :ex,:id_c)";
        $db = config::getConnexion();
        
        try {

            $query = $db->prepare($sql);
   
            $query->execute([
                'date' => $ord->getDate_Ordonnance(),
                'ex' => $ord->getExamen(),
                'id_c'=>$ord->getId_c()
            ]);
     
            
    
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
























    public function showPatient($id_rdv)
    {
        $sql = "SELECT * FROM rendezvous,user WHERE DATE(rendezvous.date_rdv) = CURDATE() and rendezvous.id_rdv=$id_rdv and rendezvous.id_user = user.id_user";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function addConsultation($consult)
    {
        $sql = "INSERT INTO `consultation` (`id_c`, `date_consultation`, `description_consultation`, `symptomes`, `prescription_consultation`, `examen_consultation`,`isdelete`, `id_rdv`,`id_med` ) VALUES (NULL, :date, :desc, :symptomes, :prescription, :examen,:isdelete,:id_rdv,:id_m)";
        $db = config::getConnexion();
        
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $consult->getDate_consultation(),
                'desc' => $consult->getDescription_conultation(),
                'symptomes' => $consult->getSymptomes(),
                'prescription' => $consult->getPrescription_conultation(),
                'examen' => $consult->getExamen(),
                'isdelete' => $consult->getisdelete(),
                'id_rdv' => $consult->getId_r(),
                'id_m'=>'MM12345676'
            ]);
    
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function listDossier($id)
    {
        $sql = "SELECT DISTINCT consultation.id_c, consultation.date_consultation, consultation.description_consultation, consultation.symptomes, consultation.prescription_consultation, consultation.examen_consultation, consultation.isdelete FROM consultation, rendezvous, user WHERE consultation.id_rdv = rendezvous.id_rdv AND rendezvous.id_user =:id AND consultation.isdelete = 0;";
        $db = config::getConnexion();
        try {
            $list = $db->prepare($sql);
            $list->execute([
                'id' => $id
            ]);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteConsult($id_c)
    {
        $sql = "UPDATE consultation SET isdelete=1 WHERE id_c=:id";
        $db = config::getConnexion();
        try {
            $del = $db->prepare($sql);
            $del->execute(['id' => $id_c]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function UpdateConsult($id_c, $d, $s, $p, $ex)
    {
        $sql = "UPDATE consultation SET description_consultation=:desc, symptomes=:s, prescription_consultation=:pres, examen_consultation=:ex WHERE id_c=:id";
        $db = config::getConnexion();
        try {
            $up = $db->prepare($sql);
            $up->execute([
                'desc' => $d,
                's' => $s,
                'pres' => $p,
                'ex' => $ex,
                'id' => $id_c
            ]);
  
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function getConsult($id_c)
    {
        $sql = "SELECT * from consultation where id_c = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id_c]);

            $consult = $query->fetch();
            return $consult;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



}


?>