
<?php
include_once '../config.php';
include_once '../Controller/commentaireC.php';

if (isset($_GET['comment_id']) && isset($_GET['id_b'])) {
    $idComment = $_GET['comment_id'];
    echo $idComment;
    $blogId = $_GET['id_b'];
    $commentC = new CommentC();
   

    $commentC->deleteCommentaire($idComment);

    if (isset($_GET["id_b"])) {
        header("Location:read_more.php?id_b={$_GET['id_b']}");
        exit();
    } else {
        header("Location:read_more.php?id_b={$_GET['id_b']}");
        exit();
    }
} else {
    echo "Comment ID not provided.";
}
?>
