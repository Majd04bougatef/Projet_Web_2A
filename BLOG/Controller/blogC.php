<?php 
include '../connect.php';
include '../Model/blog.php';
class blogC
{
   
    public function listblogs()
    {
        $sql = "SELECT * FROM blog where isdelete=0";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteblog($id)
    {
        $sql = "UPDATE blog SET isdelete = 1 WHERE id_b = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addblog($blog)
{
    
    $sql = "INSERT INTO `blog` (`id_b`, `titre_blog`,`sujet_blog`,`desc_blog`,`date_blog`,`id_user`) VALUES ( NULL,:titre_blog,:sujet_blog,:desc_blog, :date_blog,'MM12345676');";
   // $sql = "SELECT * from blog where id_b= :id ";

    $db = config::getConnexion();
    try {
        
        $query = $db->prepare($sql);
        $query->execute([
            'titre_blog' => $blog->getTitreBlog(),
            'sujet_blog' => $blog->getSujetBlog(),
            'desc_blog' => $blog->getDescBlog(),
            'date_blog' => date('Y-m-d')

            // 'date_blog' => $blog->getDateBlog()->format('Y-m-d')
        ]);

        echo 'azazaz';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

    function updateblog($blog, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE blog SET 
                    titre_blog = :titre_blog, 
                    sujet_blog = :sujet_blog, 
                    desc_blog = :desc_blog, 
                    date_blog = :date_blog
                WHERE id_b = :id_b'
            );
            $query->execute([
                'id_b' => $id,
                'titre_blog' => $blog->getTitreBlog(),
                'sujet_blog' => $blog->getSujetBlog(),
                'desc_blog' => $blog->getDescBlog(),
                'date_blog' => $blog->getDateBlog()->format('Y-m-d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showblog($id)
    {
        $sql = "SELECT * from blog where id_b = $id and isdelete=0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
}
?>