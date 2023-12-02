<?php
include_once '../config.php';
include_once '../model/consultation.php';

class consultationfunction
{

    //Medecin
    public function listRendez_vous_calendar_Monday($selectedDate)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        if ($dateTime->format('N') != 1) { 
            $mondayOfSelectedWeek = $dateTime->modify('this week monday')->format('Y-m-d');
        } else {
            $mondayOfSelectedWeek = $dateTime->format('Y-m-d');
        }


        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $mondayOfSelectedWeek);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listRendez_vous_calendar_Tuesday($selectedDate)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }
    
        $dateTime = new DateTime($selectedDate);
        
        if ($dateTime->format('N') != 2) { 
            $tuesdayOfSelectedWeek = $dateTime->modify('this week tuesday')->format('Y-m-d');
        } else {
            $tuesdayOfSelectedWeek = $dateTime->format('Y-m-d');
        }
    

        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $tuesdayOfSelectedWeek);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Wednesday($selectedDate)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        $dateTime->modify('this week')->modify($selectedDate);

        if ($dateTime->format('N') != 3) { 
            $wednesdayOfSelectedWeek = $dateTime->modify('next wednesday')->format('Y-m-d');
        } else {
            $wednesdayOfSelectedWeek = $dateTime->format('Y-m-d');
        }

    
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $wednesdayOfSelectedWeek);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Thursday($selectedDate)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        $dateTime->modify('this week')->modify($selectedDate);

        if ($dateTime->format('N') != 4) {
            $thursdayOfSelectedWeek = $dateTime->modify('this week thursday')->format('Y-m-d');
        } else {
            $thursdayOfSelectedWeek = $dateTime->modify('next week thursday')->format('Y-m-d');
        }

       
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $thursdayOfSelectedWeek);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Friday($selectedDate)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        $dateTime->modify('this week')->modify($selectedDate);

        if ($dateTime->format('N') != 5) { 
            $fridayOfSelectedWeek = $dateTime->modify('next friday')->format('Y-m-d');
        } else {
            $fridayOfSelectedWeek = $dateTime->format('Y-m-d');
        }

    
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $fridayOfSelectedWeek);
            $stmt->execute();
            return $stmt->fetchAll();
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

            $query2 = $db->prepare("UPDATE rendezvous SET statut=1 WHERE id_rdv=:id");
            $query2->execute([ 'id' => $consult->getId_r() ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function listDossier($id)
    {
        $sql = "SELECT DISTINCT ordonnance.fichier_pdf , consultation.id_c, consultation.date_consultation, consultation.description_consultation, consultation.symptomes, consultation.prescription_consultation, consultation.examen_consultation, consultation.isdelete FROM ordonnance,consultation, rendezvous, user WHERE consultation.id_rdv = rendezvous.id_rdv AND rendezvous.id_user =:id AND ordonnance.id_c=consultation.id_c AND consultation.isdelete = 0;";
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

 //patient   

    function lister_Medecin($id_p)
    {
        $sql = "SELECT DISTINCT user.nom,user.prenom,rendezvous.id_med from rendezvous,user where rendezvous.id_user=:id and rendezvous.id_med=user.id_user and  user.role='medecin'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id_p]);

            $consult = $query->fetchAll(PDO::FETCH_ASSOC);
        
            return $consult;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function Dossier_Patient($id_p,$id_m)
    {
        $sql = "SELECT DISTINCT consultation.date_consultation, consultation.description_consultation, consultation.symptomes,consultation.prescription_consultation,consultation.examen_consultation  from rendezvous,consultation where rendezvous.id_user=:id_p and rendezvous.id_med=:id_m and rendezvous.id_rdv =consultation.id_rdv";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_p' => $id_p,'id_m'=>$id_m]);

            $consult = $query->fetchAll(PDO::FETCH_ASSOC);
        
            return $consult;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


//Admin
    public function listMedecinsBySpecialite($specialite)
    {
        $sql = "SELECT * FROM user WHERE role = 'medecin' AND specialite = :specialite";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':specialite', $specialite);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    public function listRendez_vous_calendar_Monday_admin($selectedDate,$id_med)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        if ($dateTime->format('N') != 1) { 
            $mondayOfSelectedWeek = $dateTime->modify('this week monday')->format('Y-m-d');
        } else {
            $mondayOfSelectedWeek = $dateTime->format('Y-m-d');
        }

        echo $id_med;
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user and id_med=:id_m ";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $mondayOfSelectedWeek);
            $stmt->bindParam(':id_m', $id_med);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listRendez_vous_calendar_Tuesday_admin($selectedDate,$id_med)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }
    
        $dateTime = new DateTime($selectedDate);
        
        if ($dateTime->format('N') != 2) { 
            $tuesdayOfSelectedWeek = $dateTime->modify('this week tuesday')->format('Y-m-d');
        } else {
            $tuesdayOfSelectedWeek = $dateTime->format('Y-m-d');
        }
    
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user and id_med=:id_m ";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $tuesdayOfSelectedWeek);
            $stmt->bindParam(':id_m', $id_med);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Wednesday_admin($selectedDate,$id_med)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        $dateTime->modify('this week')->modify($selectedDate);

        if ($dateTime->format('N') != 3) { 
            $wednesdayOfSelectedWeek = $dateTime->modify('next wednesday')->format('Y-m-d');
        } else {
            $wednesdayOfSelectedWeek = $dateTime->format('Y-m-d');
        }

      
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user and id_med=:id_m";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $wednesdayOfSelectedWeek);
            $stmt->bindParam(':id_m', $id_med);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Thursday_admin($selectedDate,$id_med)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        $dateTime->modify('this week')->modify($selectedDate);

        if ($dateTime->format('N') != 4) {
            $thursdayOfSelectedWeek = $dateTime->modify('this week thursday')->format('Y-m-d');
        } else {
            $thursdayOfSelectedWeek = $dateTime->modify('next week thursday')->format('Y-m-d');
        }

        
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user and id_med=:id_m";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $thursdayOfSelectedWeek);
            $stmt->bindParam(':id_m', $id_med);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listRendez_vous_calendar_Friday_admin($selectedDate,$id_med)
    {
        if (empty($selectedDate)) {
            $selectedDate = date('Y-m-d');
        }

        $dateTime = new DateTime($selectedDate);

        $dateTime->modify('this week')->modify($selectedDate);

        if ($dateTime->format('N') != 5) { 
            $fridayOfSelectedWeek = $dateTime->modify('next friday')->format('Y-m-d');
        } else {
            $fridayOfSelectedWeek = $dateTime->format('Y-m-d');
        }

   
        
        $sql = "SELECT * FROM rendezvous, user WHERE rendezvous.date_rdv = :selectedDate AND isdelete = 0 AND rendezvous.id_user = user.id_user and id_med=:id_m";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':selectedDate', $fridayOfSelectedWeek);
            $stmt->bindParam(':id_m', $id_med);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }





}
