

<?php
include_once '../config.php';

class function_medtun
{

    
    public function conter_nombre_medecin()
    {
        $sql = "SELECT COUNT(*) as nombre_medecin FROM user WHERE role='medecin'";
        $db = config::getConnexion();
        try {
            $result = $db->prepare($sql);
            $result->execute();
            $nombre_medecin = $result->fetchColumn();

            return $nombre_medecin;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function conter_nombre_specialite()
    {
        $sql = "SELECT COUNT(DISTINCT specialite) as nombre_specialite FROM user";
        $db = config::getConnexion();
        try {
            $result = $db->prepare($sql);
            $result->execute();
            $nombre_specialite = $result->fetchColumn();

            return $nombre_specialite;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function conter_nombre_blog()
    {
        $sql = "SELECT COUNT(DISTINCT id_b)  FROM blog";
        $db = config::getConnexion();
        try {
            $result = $db->prepare($sql);
            $result->execute();
            $nombre_specialite = $result->fetchColumn();

            return $nombre_specialite;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function conter_nombre_event()
    {
        $sql = "SELECT COUNT(DISTINCT id_e)  FROM evenement";
        $db = config::getConnexion();
        try {
            $result = $db->prepare($sql);
            $result->execute();
            $nombre_specialite = $result->fetchColumn();

            return $nombre_specialite;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}


?>