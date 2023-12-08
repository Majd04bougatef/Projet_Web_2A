<?php
// like_blog.php

// Inclure votre configuration de base de données ici
// require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données de la demande AJAX
    $blogId = $_POST['id_b'];

    // Mettre à jour la base de données avec le like
    // (Assurez-vous de gérer correctement les requêtes SQL pour éviter les injections)
    // Exemple avec PDO
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=medtun");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Incrémenter le compteur de likes dans la table blogs
        $stmt = $pdo->prepare("UPDATE blogs SET likes = likes + 1 WHERE id_b = :blog_id");
        $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
        $stmt->execute();

        // Retourner une réponse (peut être un message JSON)
        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo json_encode(["error" => "Erreur de base de données"]);
    }
}
?>
