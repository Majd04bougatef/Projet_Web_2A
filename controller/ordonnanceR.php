

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


    public function addOrdonnanceWithPDF($id_c,$pdfContent)
    {
        $sql = "UPDATE ordonnance SET fichier_pdf=:pdf WHERE id_c=:id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);

            $query->execute([
                'pdf' => $pdfContent,
                'id' => $id_c
            ]);

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function lister_ordonnance($id_c)
    {
        $sql = "SELECT * FROM ordonnance WHERE id_c=:id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);

            $query->execute([
                'id' => $id_c
            ]);

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    


}


?>