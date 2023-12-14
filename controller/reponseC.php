<?php

include_once '../config.php';
include '../model/reponse.php';

class reponseC
{

    public function afficher()
    {
        $sql = "SELECT * FROM reponse";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function supprimer($id_rep)
    {
        $sql = "DELETE FROM reponse WHERE id_rep = :id_rep";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rep', $id_rep);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function ajouter($reponse)
    {
        $sql = "INSERT INTO reponse (reponse, date_reponse, id_rec)
        VALUES (:reponse,:date_reponse, :id_rec)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'reponse' => $reponse->getReponse(),
                'date_reponse' => $reponse->getDate(),
                'id_rec' => $reponse->getIDReclamation()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function modifier($reponse, $id_rep)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    reponse = :reponse, 
                    date_reponse = :date_reponse,
                    id_rec = :id_rec
                WHERE id_rep= :id_rep'
            );
            $query->execute([
                'id_rep' => $id_rep,
                'reponse' => $reponse->getReponse(),
                'date_reponse' => $reponse->getDate(),
                'id_rec' => $reponse->getIDReclamation()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function recupererReponse($id_rep){
        $sql="SELECT * from reponse where id_rep=$id_rep";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $reponse=$query->fetch();
            return $reponse;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererReponseFromRec($id_rec){
        $sql="SELECT * from reponse where id_rec=$id_rec";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function triReponse()
    {
        $sql = "SELECT * FROM reponse order by reponse";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercheReponse($rech)
    {
        $sql = "SELECT * FROM reponse where reponse.reponse like '%$rech%' or reponse.date_reponse like '%$rech%'";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
