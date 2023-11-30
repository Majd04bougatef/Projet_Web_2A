<?php
// Assurez-vous que la session est démarrée
session_start();

include_once '../config.php';
include_once '../Controller/CommentC.php';

$commentC = new CommentC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $contenu = $_POST["contenu"];
    $date_commentaire = date("Y-m-d H:i:s"); // Utilisez la date actuelle

    // Récupérer l'ID de l'événement depuis le formulaire
    $id_e = $_POST["id_e"];

    // Récupérer l'ID de l'utilisateur depuis la session PHP
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

    // Vérifier si l'ID de l'utilisateur est disponible
    if ($id_user) {
        // Créer un objet Comment
        $comment = new Comment(null, $contenu, $date_commentaire, $id_e, $id_user);

        // Ajouter le commentaire à la base de données
        $result = $commentC->addComment($comment);

        // Vérifier si l'ajout du commentaire a réussi
        if ($result === true) {
            // Redirection vers la page event_details.php avec l'ID de l'événement
            header('Location: event_details.php?id_event=' . $id_e);
            exit();
        } else {
            // Gérer l'erreur d'ajout de commentaire
            echo "Error adding comment: " . $result;
        }
    } else {
        // Gérer l'erreur si l'ID de l'utilisateur n'est pas disponible
        echo "User ID not available.";
    }
} else {
    // Gérer l'erreur si la requête n'est pas une requête POST
    echo "Invalid request method.";
}
?>
