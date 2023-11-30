<?php
include_once '../config.php';
include_once '../Model/eventmodel.php';

class EventC
{
    public function listEvents()
    {
        $sql = "SELECT id_e, titre_event, desc_event FROM evenement";
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
                VALUES (NULL, :titre, :sujet, :desc, :lieu, :dateDebut, :dateFin, :capacite, :idUser)";
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
            ]);

            // Ajout du return pour indiquer le succès de l'opération
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
                    date_debut_event = :dateDebut,
                    date_fin_event = :dateFin,
                    capacite = :capacite
                WHERE id_e = :id'
            );
    
            $query->execute([
                'titre' => isset($event['titre']) ? $event['titre'] : null,
                'lieu' => isset($event['lieu']) ? $event['lieu'] : null,
                'dateDebut' => isset($event['dateDebut']) ? $event['dateDebut'] : null,
                'dateFin' => isset($event['dateFin']) ? $event['dateFin'] : null,
                'capacite' => isset($event['capacite']) ? $event['capacite'] : null,
                'id' => isset($event['id']) ? $event['id'] : null,
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
            // Utilisez un log ou gestionnaire d'erreurs approprié au lieu de mourir directement
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
