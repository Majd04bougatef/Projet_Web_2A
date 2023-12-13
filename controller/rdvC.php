<?php
include '../config.php';
include '../model/trdv.php';

class rdvC
{
    public function listrdv($p,$v,$s)
    {
        $sql = "SELECT nom ,prenom,specialite,id_user,image from user where  role='medecin' and pays=:pays and ville=:vil and specialite=:spe";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'pays' => $p,
                'vil' => $v,
                'spe' => $s
            ]);
            return $query;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }   

    public function listermed($id)
    {
        $sql = "SELECT DISTINCT user.nom, user.prenom, user.id_user
                FROM user, rendezvous
                WHERE role = 'medecin' AND rendezvous.id_med = user.id_user AND rendezvous.id_user = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
                return $query;
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listrdv_med($idu,$med){
        $sql = "SELECT rendezvous.id_rdv,rendezvous.date_rdv,rendezvous.deb_rdv,rendezvous.fin_rdv,categorie.categorie FROM rendezvous,categorie WHERE id_med = :med AND id_user = :idu and rendezvous.id_categorie=categorie.id_categorie and isdelete=0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':med', $med);
            $query->bindValue(':idu', $idu);
            $query->execute();
                return $query;
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listrdv_pat_admin ($id){
        $sql = "SELECT user.id_user,user.nom,user.prenom ,rendezvous.id_rdv,rendezvous.date_rdv,rendezvous.deb_rdv,rendezvous.fin_rdv,categorie.categorie FROM user,rendezvous,categorie WHERE id_med = :med AND  rendezvous.id_categorie=categorie.id_categorie and rendezvous.id_user=user.id_user and  isdelete=0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':med', $id);
         
            $query->execute();
                return $query;
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listMedecinsBySpecialite ($spe){
        $sql = "SELECT* FROM user WHERE role='medecin' and specialite=:sp";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':sp', $spe);
         
            $query->execute();
                return $query;
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listrdv_pat($idu,$med){
        $sql = "SELECT rendezvous.id_rdv,rendezvous.date_rdv,rendezvous.deb_rdv,rendezvous.fin_rdv,categorie.categorie FROM rendezvous,categorie WHERE id_med = :med AND id_user = :idu and rendezvous.id_categorie=categorie.id_categorie and isdelete=0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':med', $med);
            $query->bindValue(':idu', $idu);
            $query->execute();
                return $query;
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

  

    function deleterdv($id_rdv)
    {
        $sql = "UPDATE rendezvous
        SET isdelete=1 WHERE id_rdv  = :id_rdv";
        $db = config::getConnexion();
        

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id_rdv', $id_rdv);
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addrdv($rendezvous)
    {
        $sql = "INSERT INTO rendezvous (id_rdv,date_rdv, deb_rdv, fin_rdv, id_categorie, id_user,id_med, isdelete) 
                VALUES (NULL,:date, :dateDeb, :dateFin, 2, 'PA12345678','MM12345676', 0)";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $rendezvous->getrdv_date(),
                'dateDeb' => $rendezvous->getdebrdv(),
                'dateFin' => $rendezvous->getfinrdv(),
             
            ]);
    
            echo 'Insertion réussie';
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    } 
    



    function updaterdv($rendezvous, $id)
    {
        $sql =  'UPDATE rendezvous SET  date_rdv = :drdv WHERE id_rdv = :idrdv ' ;
        $db = config::getConnexion();
            
        try {
            $query = $db->prepare($sql);
            $query->execute([
                
                'drdv' => $rendezvous,
                'idrdv' => $id
                
            ]);
            echo $query->rowCount() . " rendezvous UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    } 
    function updaterdvP($rendezvous, $id)
    {
        $sql =  'UPDATE rendezvous SET  date_rdv = :drdv WHERE id_usr = "PA12345678" ' ;
        $db = config::getConnexion();
            
        try {
            $query = $db->prepare($sql);
            $query->execute([
                
                'drdv' => $rendezvous,
                'idrdv' => $id
                
            ]);
            echo $query->rowCount() . " rendezvous UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    } 
    function show()
    {
        $sql = "SELECT * FROM rendezvous WHERE isdelete=0 ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
    
            $rendezvous = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rendezvous;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function seachshow()
    {
        $sql = "SELECT * FROM rendezvous WHERE isdelete=0 and name like ':nom'% ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $query->execute([':nom' => $nom]);
    
            $rendezvous = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rendezvous;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showR()

    {
        $sql = "SELECT * FROM rendezvous 
        where id_user='PA12345677'; 
        AND isdelete=0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
    
            $rendezvous = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rendezvous;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showM()
    {
        $sql = "SELECT * FROM rendezvous 
        where id_med='MM12345676'
        AND isdelete=0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
    
            $rendezvous = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rendezvous;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    


    function show_update($id_rdv){
        $sql = "SELECT * FROM user,rendezvous WHERE rendezvous.id_user=user.id_user and rendezvous.id_rdv=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([':id' => $id_rdv]);
    
            return $query;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    public function show_info_patient($id){
        $sql = "SELECT nom,prenom,mail FROM user WHERE id_user=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
    
            return $query;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}  

?> 