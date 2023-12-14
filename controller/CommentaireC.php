<?php
include_once '../config.php';
include_once '../Model/commentaire.php';

class commentC
{
    public function listCommentaires()
    {
        $sql = "SELECT * FROM commentaire_blog where isdelete=0";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommentaire($id)
    {
        $sql = "UPDATE commentaire_blog SET isdelete = 1 WHERE id_com = :id";
        $db = config::getConnexion();
    
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
    
            echo $req->rowCount() . " enregistrements supprimés avec succès <br>";
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    function addCommentaire($commentaire)
    {
        $sql = "INSERT INTO `commentaire_blog` (`id_com`, `id_b`, `date_commentaire`, `desc_commentaire`) VALUES (NULL, :id_b, :date_commentaire, :desc_commentaire);";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_b' => $commentaire->getIdB(),
                'date_commentaire' => $commentaire->getDateCommentaire()->format('Y-m-d'),
                'desc_commentaire' => $commentaire->getDescCommentaire(),
            ]);

            echo 'Commentaire ajouté avec succès.';
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCommentaire($commentaire, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire_blog SET 
                    date_commentaire = :date_commentaire, 
                    desc_commentaire = :desc_commentaire,
                    id_b = :id_b
                WHERE id_com = :id_com'
            );
    
            $query->execute([
                'id_com' => $id,
                'date_commentaire' => $commentaire->getDateCommentaire()->format('Y-m-d'),
                'desc_commentaire' => $commentaire->getDescCommentaire(),
                'id_b' => $commentaire->getIdB()
            ]);
    
            echo $query->rowCount() . " enregistrements mis à jour avec succès <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    

    function showCommentaire($id)
    {
        $sql = "SELECT * FROM commentaire_blog WHERE id_com = $id AND isdelete = 0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getCommentsForBlog($blogId)
    {
        $sql = "SELECT * FROM commentaire_blog WHERE id_b = :blogId  AND isdelete = 0";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':blogId', $blogId, PDO::PARAM_INT);
            $query->execute();

            $comments = $query->fetchAll();
            return $comments;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
