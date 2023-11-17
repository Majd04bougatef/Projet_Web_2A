<?php
include_once '../config.php';
include_once '../model/consultation.php';

class consultationfunction
{
    public function listRendez_vous()
    {
        $sql = "SELECT * FROM rendezvous,user WHERE DATE(rendezvous.date_rdv) = CURDATE() and rendezvous.id_user = user.id_user";
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
        $sql = "INSERT INTO `consultation` (`id_c`, `date_consultation`, `description_consultation`, `symptomes`, `prescription_consultation`, `examen_consultation`, `duree_consultation`, `id_rdv` ) VALUES (NULL, :date, :desc, :symptomes, :prescription, :examen, :duree,:id)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $consult->getDate_consultation(),
                'desc' => $consult->getDescription_conultation(),
                'symptomes' => $consult->getSymptomes(),
                'prescription' => $consult->getPrescription_conultation(),
                'examen' => $consult->getExamen(),
                'duree' => $consult->getDuree(),
                'id' => $consult->getId_r()
            ]);
    
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function listDossier($nom,$prenom,$age)
    {
        $sql = "SELECT * FROM consultation,rendezvous,user WHERE consultation.id_rdv=rendezvous.id_rdv and rendezvous.id_user=user.id_user and user.nom=:nom and user.prenom=:prenom and user.age=:age;";
        $db = config::getConnexion();
        try {
            $list = $db->prepare($sql);
            $list->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'age' => $age
            ]);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteConsult($id_c)
    {
        $sql = "DELETE from consultation WHERE id_c=:id";
        $db = config::getConnexion();
        try {
            $del = $db->prepare($sql);
            $del->execute(['id' => $id_c]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function UpdateConsult($id_c)
    {
        $sql = "UPDATE consultation SET ";
        $db = config::getConnexion();
        try {
            $del = $db->prepare($sql);
            $del->execute(['id' => $id_c]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function getConsult($id_c)
    {
        $sql = "SELECT * FROM consultation WHERE id_c=:id";
        $db = config::getConnexion();
        try {
            $cons = $db->prepare($sql);
            $cons->execute(['id' => $id_c]);
            return $cons;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


}
