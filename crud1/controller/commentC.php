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
        $query->execute([
            'content' => $comment->getContenu(),
            'userId' => $comment->getIdUser(),
            'eventId' => $comment->getIdE(),
        ]);

        return "Comment added successfully.";
    } catch (Exception $e) {
        throw new Exception('Error adding comment: ' . $e->getMessage());
    }
}


    public function updateComment($comment)
    {
        $sql = "UPDATE commentaire SET content = :content WHERE id_comment = :commentId";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'content' => $comment->getContent(),
                'commentId' => $comment->getId(),
            ]);

            return $query->rowCount();
        } catch (Exception $e) {
            throw new Exception('Error updating comment: ' . $e->getMessage());
        }
    }

    public function deleteComment($commentId)
    {
        $sql = "DELETE FROM commentaire WHERE id_comment = :commentId";
        $db = config::getConnexion();

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
        $sql = "SELECT * FROM commentaire"; // ajustez la requête en fonction de votre structure de base de données
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

}
?>
