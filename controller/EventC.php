<?php
include_once '../config.php';
include_once '../Model/eventmodel.php';

class EventC
{
    public function listEvents()
    {
        $sql = "SELECT * FROM evenement";
        $db = config::getConnexion();
        
        try {
            $liste = $db->query($sql);
            $results = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    
    function deleteEvent($id)
    {
        $sql = "DELETE FROM evenement WHERE id_e = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function userExists($userId)
    {
        $sql = "SELECT COUNT(*) as count FROM user WHERE id_user = :userId";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindParam(':userId', $userId);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Si le nombre d'utilisateurs trouvés est supérieur à zéro, l'utilisateur existe
            return $result['count'] > 0;
        } catch (PDOException $e) {
            // Lancer une exception PDO pour capturer les erreurs SQL
            throw new Exception('Error checking user existence: ' . $e->getMessage());
        }
    }

    public function addUser($userId)
    {
        echo "Adding user: ";
        if ($this->userExists($userId)) {
            return "User with ID $userId already exists.";
        }

        $sql = "INSERT INTO user (id_user) VALUES (:userId)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':userId', $userId);
            $query->execute();

            return "User with ID $userId added successfully.";
        } catch (Exception $e) {
            throw new Exception('Error adding user: ' . $e->getMessage());
        }
    }
    public function addEvent($event)
{
    $sql = "INSERT INTO evenement 
            VALUES (NULL, :titre, :sujet, :desc, :lieu, :dateDebut, :dateFin, :capacite, :idUser, :image)";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'titre' => $event->getTitreEvent(),
            'sujet' => $event->getSujetEvent(),
            'desc' => $event->getDescEvent(),
            'lieu' => $event->getLieuEvent(),
            'dateDebut' => $event->getDateDebutEvent(),
            'dateFin' => $event->getDateFinEvent(),
            'capacite' => $event->getCapacite(),
            'idUser' => $event->getIdUser(),
            'image' => $event->getImage(),  
        ]);
        return "Event added successfully.";
    } catch (Exception $e) {
        throw new Exception('Error adding event: ' . $e->getMessage());
    }
}

    



function updateEvent($event)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE evenement SET 
                titre_event = :titre,
                lieu_event = :lieu,
                sujet_event = :sujet,
                desc_event = :desc,  -- Add desc_event field
                date_debut_event = :dateDebut,
                date_fin_event = :dateFin,
                capacite = :capacite
            WHERE id_e = :id'
        );

        $query->execute([
            'titre' => isset($event['titre_event']) ? $event['titre_event'] : null,
            'lieu' => isset($event['lieu_event']) ? $event['lieu_event'] : null,
            'sujet' => isset($event['sujet_event']) ? $event['sujet_event'] : null,
            'desc' => isset($event['desc_event']) ? $event['desc_event'] : null,
            'dateDebut' => isset($event['date_debut_event']) ? $event['date_debut_event'] : null,
            'dateFin' => isset($event['date_fin_event']) ? $event['date_fin_event'] : null,
            'capacite' => isset($event['capacite']) ? $event['capacite'] : null,
            'id' => isset($event['id_e']) ? $event['id_e'] : null,
        ]);

        return $query->rowCount();
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

    
    
    

    function showEvent($id)
    {
        $sql = "SELECT * FROM evenement WHERE id_e= :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
          
            die('Error: ' . $e->getMessage());
        }
    }
    public function searchEvents($searchTerm)
    {
        $db = Config::getConnexion();
        $query = "SELECT * FROM evenement WHERE titre_event LIKE '%$searchTerm%'";
        $result = $db->query($query);
        return $result->fetchAll();
    }
    public function filterByDate($startDate, $endDate)
{
    $db = Config::getConnexion();
    $query = "SELECT * FROM evenement WHERE date_debut_event >= :startDate AND date_fin_event <= :endDate";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':endDate', $endDate);
    
    $stmt->execute();
    
    return $stmt->fetchAll();
}

   public function showCalendar()
{
    $query = "SELECT id_e, titre_event, date_debut_event, date_fin_event FROM evenement";
    $db = config::getConnexion();
    $stmt = $db->query($query);
    $events = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $event = array(
            'id_e' => $row['id_e'],
            'titre_event' => $row['titre_event'],
            'date_debut' => $row['date_debut_event'],
            'date_fin' => $row['date_fin_event'],
        );
        $events[] = $event;
    }



    return $events;
}

    function uploadImage($file, $uploadDir)
{
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        return "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    $targetPath = $uploadDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $targetPath; 
    } else {
        return "Failed to upload the image.";
    }
}

public function listEvents_medecin($id){
    $sql = "SELECT * FROM evenement  WHERE id_user=:id";
        $db = config::getConnexion();
        
        try {
            $liste = $db->prepare($sql);
            $liste->execute(['id' => $id]);
            $results = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
}
    
}
?>
