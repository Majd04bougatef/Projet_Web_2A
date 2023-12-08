<?php
include_once '../config.php';
include_once '../Model/blog.php';

class BlogC
{
    public function listBlogs()
    {
        $sql = "SELECT * FROM blog WHERE isdelete=0";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteBlog($id)
    {
        $sql = "UPDATE blog SET isdelete = 1 WHERE id_b = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addBlog($blog)
    {
        $sql = "INSERT INTO `blog` (`id_b`, `titre_blog`, `sujet_blog`, `desc_blog`, `date_blog`, `id_user`,`image`) 
                VALUES (NULL, :titre_blog, :sujet_blog, :desc_blog, :date_blog, 'MM12345676' , :image);";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre_blog' => $blog->getTitreBlog(),
                'sujet_blog' => $blog->getSujetBlog(),
                'desc_blog' => $blog->getDescBlog(),
                'date_blog' => date('Y-m-d'),
                'image' => $blog->getImage(),
            ]);

            echo 'Blog added successfully.';
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateBlog($blog, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE blog SET 
                titre_blog = :titre_blog, 
                sujet_blog = :sujet_blog, 
                desc_blog = :desc_blog, 
                date_blog = CURRENT_DATE()
            WHERE id_b = :id_b'
        );
        $query->execute([
            'id_b' => $id,
            'titre_blog' => $blog->getTitreBlog(),
            'sujet_blog' => $blog->getSujetBlog(),
            'desc_blog' => $blog->getDescBlog(),
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    public function showBlog($id)
    {
        $sql = "SELECT * FROM blog WHERE id_b = :id AND isdelete = 0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getBlogDetails($blogId) {
        $sql = "SELECT * FROM blog WHERE id_b = :id AND isdelete = 0";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $blogId, PDO::PARAM_INT);
            $query->execute();
    
            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            // Handle the exception, e.g., log it or show an error message
            return false;
        }
    }
    public function searchBlogsByTitle($searchTerm)
    {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT * FROM blog WHERE titre_blog LIKE :searchTerm");
        $query->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>
