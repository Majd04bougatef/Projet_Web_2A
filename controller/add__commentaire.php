<?php
include_once '../Controller/commentaireC.php';

$error = "";

// Create a null commentaire
$commentaire = null;

// Create an instance of the controller
$commentaireC = new commentC();

if (isset($_POST["desc_commentaire"])) {
    if (!empty($_POST["desc_commentaire"])) {
        // Create a new comment object
        $commentaire = new Comment(
            null,
            $_POST['id_b'],  // Assuming $blogId contains the blog ID
            new DateTime(),
            $_POST['desc_commentaire']
        );

        // Add the comment
        $commentaireC->addCommentaire($commentaire,$_POST['username']);

        header('Location:read_more.php?id_b=' .$_POST['id_b']);
        exit();
    } else {
        $error = "Missing information";
    }
}
?>

