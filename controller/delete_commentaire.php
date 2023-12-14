<?php
include_once '../Controller/commentaireC.php';

$commentaireC = new CommentC(); // Ensure the object is created

// Delete commentaire
if (isset($_GET['delete_comment'])) {
    $commentId = $_GET['delete_comment'];
    $commentaireC->deleteCommentaire($commentId);
    header('Location: read_more.php');
    exit();
}
?>
