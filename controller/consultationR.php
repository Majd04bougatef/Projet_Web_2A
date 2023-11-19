<?php
include_once '../config.php';
include_once '../model/consultation.php';

class consultationfunction
{
    public function listRendez_vous_calendar_Monday()
    {
        $sql = "SELECT * FROM rendezvous,user WHERE rendezvous.date_rdv='2023-11-13' and isdelete=0 and rendezvous.id_user=user.id_user";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Tuesday()
    {

        $sql = "SELECT * FROM rendezvous,user WHERE DAYOFWEEK(rendezvous.date_rdv) = 3 and isdelete=0 and rendezvous.id_user=user.id_user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Wednesday()
    {
        $sql = "SELECT * FROM rendezvous,user WHERE DAYOFWEEK(rendezvous.date_rdv) = 4 and isdelete=0 and rendezvous.id_user=user.id_user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Thursday()
    {
        
        $sql = "SELECT * FROM rendezvous,user WHERE DAYOFWEEK(rendezvous.date_rdv) = 5 and isdelete=0 and rendezvous.id_user=user.id_user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Friday()
    {
        $sql = "SELECT * FROM rendezvous,user WHERE  rendezvous.date_rdv='2023-11-17' and isdelete=0 and rendezvous.id_user=user.id_user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
          
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

        
    }






    public function listRendez_vous()
    {
        $sql = "SELECT * FROM rendezvous  ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
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
        $sql = "INSERT INTO `consultation` (`id_c`, `date_consultation`, `description_consultation`, `symptomes`, `prescription_consultation`, `examen_consultation`, `id_rdv` ) VALUES (NULL, :date, :desc, :symptomes, :prescription, :examen,:id)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $consult->getDate_consultation(),
                'desc' => $consult->getDescription_conultation(),
                'symptomes' => $consult->getSymptomes(),
                'prescription' => $consult->getPrescription_conultation(),
                'examen' => $consult->getExamen(),
                'id' => $consult->getId_r()
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
