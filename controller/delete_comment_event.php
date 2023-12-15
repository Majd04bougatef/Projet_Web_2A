<?php
include_once '../config.php';
include_once '../Controller/CommentC.php';

if (isset($_GET["id_commentaire"])) {
    $commentC = new CommentC();
    $idComment = $_GET["id_commentaire"];

    $commentC->deleteComment($idComment);

    if (isset($_GET["id_event"])) {
        header('Location: event_details.php?id_event=' . $_GET["id_event"]);
        exit();
    } else {
        echo "Event ID not provided.";
    }
} else {
    echo "Comment ID not provided.";
}
?>