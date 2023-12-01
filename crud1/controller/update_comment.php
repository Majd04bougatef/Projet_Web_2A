<?php
session_start();
include_once '../Controller/CommentC.php';

$commentC = new CommentC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentId = $_POST["comment_id"];
    $eventId = $_POST["event_id"];
    $contenu = $_POST["updated_content"];

    // Mettez à jour le commentaire
    $commentC->updateComment($commentId, $contenu);

    // Rediriger vers les détails de l'événement
    header('Location: event_details.php?id_event=' . $eventId);
    exit();
}
?>
