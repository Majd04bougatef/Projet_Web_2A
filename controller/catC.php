<?php
include_once '../config.php';
include '../model/catM.php';

class catC {
    function addcat($idcat, $catrdv) {
        $sql = "INSERT INTO categorie (id_categorie, categorie) VALUES (:idcat, :catrdv)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idcat' => $idcat,
                'catrdv' => $catrdv
            ]);

         
        } catch (Exception $e) {
            echo '';
        }
    }
    function nbrcat()
    {
        $sql = "SELECT COUNT(*) as count FROM categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
    
            // Return the count value
            return $result['count'];
        } catch (Exception $e) {
            // Handle the exception if needed
            echo $e->getMessage();
            return 0; // Return 0 or handle the error accordingly
        }
    }

 function listcat()
{
    $sql = "SELECT * from categorie";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        return $query;
    } catch (Exception $e) {
        echo '' ; 
    }
}  
}
?>
