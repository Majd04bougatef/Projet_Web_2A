<?php

include_once '../config.php';
include '../model/reclamation.php';


class reclamationC
{

    public function afficher()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function supprimer($id_r)
    {
        $sql = "DELETE FROM reclamation WHERE id_r = :id_r";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_r', $id_r);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function ajouter($reclamation)
    {
        $sql = "INSERT INTO reclamation (nom, prenom, etat,sujet_rec, desc_rec, date_rec)
        VALUES (:nom, :prenom, :etat, :sujet_rec,:desc_rec, :date_rec)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $reclamation->getNom(),
                'prenom' => $reclamation->getPrenom(),
                'etat' => $reclamation->getEtat(),
                'sujet_rec' => $reclamation->getSujet(),
                'desc_rec' => $reclamation->getDescription(),
                'date_rec' => $reclamation->getDate()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function modifier($reclamation, $id_r)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    nom = :nom,
                    prenom = :prenom,
                    etat = :etat,
                    sujet_rec = :sujet_rec, 
                    desc_rec = :desc_rec,
                    date_rec = :date_rec
                WHERE id_r= :id_r'
            );
            $query->execute([
                'id_r' => $id_r,
                'nom' => $reclamation->getNom(),
                'prenom' => $reclamation->getPrenom(),
                'etat' => $reclamation->getEtat(),
                'sujet_rec' => $reclamation->getSujet(),
                'desc_rec' => $reclamation->getDescription(),
                'date_rec' => $reclamation->getDate()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function recupererReclamation($id_r){
        $sql="SELECT * from reclamation where id_r=$id_r";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $reclamation=$query->fetch();
            return $reclamation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function triReclamation()
    {
        $sql = "SELECT * FROM reclamation order by sujet_rec";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercheReclamation($rech)
    {
        $sql = "SELECT * FROM reclamation where reclamation.sujet_rec like '%$rech%' or reclamation.desc_rec like '%$rech%' or reclamation.date_rec like '%$rech%'";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function count_Reclamation(){

        $sql="SELECT count(id_r) FROM reclamation" ;
        $db = config::getConnexion();
        try{
            $query = $db->query($sql);
            $query->execute();
               $rec_number =$query->fetchColumn();
            return $rec_number;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function count_AvecReponse(){

        $sql="SELECT count(id_rep) FROM reponse" ;
        $db = config::getConnexion();
        try{
            $query = $db->query($sql);
            $query->execute();
               $rep_number =$query->fetchColumn();
            return $rep_number;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
}
