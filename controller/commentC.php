<?php
include_once '../config.php';
include_once '../Model/commentmodel.php';

class CommentC
{
   public function addComment($comment)
{
    $sql = "INSERT INTO commentaire (contenu, id_user, id_e) VALUES (:content, :userId, :eventId)";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindValue(':content', $comment->getContenu());
        $query->bindValue(':userId', $comment->getIdUser());
        $query->bindValue(':eventId', $comment->getIdE());
        $query->execute();

        return "Comment added successfully.";
    } catch (Exception $e) {
        throw new Exception('Error adding comment: ' . $e->getMessage());
    }
}



    public function deleteComment($commentId)
    {
        $sql = "DELETE FROM commentaire WHERE id_commentaire = :commentId";
        $db = Config::getConnexion();  

        try {
            $query = $db->prepare($sql);
            $query->execute(['commentId' => $commentId]);

            return "Comment deleted successfully.";
        } catch (Exception $e) {
            throw new Exception('Error deleting comment: ' . $e->getMessage());
        }
    }
    public function listComments()
    {
        $sql = "SELECT * FROM commentaire"; 
        $db = config::getConnexion();

        try {
            $liste = $db->query($sql);
            $results = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listCommentsForEvent($eventId)
    {
        $sql = "SELECT * FROM commentaire WHERE id_e = :eventId";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['eventId' => $eventId]);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function updateComment($commentId, $newContent) {
        $sql = "UPDATE commentaire SET contenu = :content WHERE id_commentaire = :commentId";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'content' => $newContent, // Utilisez $newContent au lieu de $comment->getContenu()
                'commentId' => $commentId, // Utilisez $commentId au lieu de $comment->getId()
            ]);
    
            return $query->rowCount();
        } catch (Exception $e) {
            throw new Exception('Error updating comment: ' . $e->getMessage());
        }
    }
    public function showComment($id)
    {
        $sql = "SELECT * FROM commentaire WHERE id_commentaire = :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $comment = $query->fetch(PDO::FETCH_ASSOC);

            if ($comment) {
                // Créez une instance de Comment avec les données récupérées de la base de données
                return new Comment(
                    $comment['id_commentaire'],
                    $comment['contenu'],
                    $comment['date_commentaire'],
                    $comment['id_e'],
                    $comment['id_user']
                );
            } else {
                return null; // Commentaire non trouvé
            }
        } catch (Exception $e) {
            // Utilisez un log ou gestionnaire d'erreurs approprié au lieu de mourir directement
            die('Error: ' . $e->getMessage());
        }
    }

    
}
?>