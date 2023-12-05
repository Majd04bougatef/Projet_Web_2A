<?php
include_once '../Controller/commentC.php';

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
            $blogId,  // Assuming $blogId contains the blog ID
            new DateTime(),
            $_POST['desc_commentaire']
        );

        // Add the comment
        $commentaireC->addCommentaire($commentaire);

        // Redirect to the comment list page
        header('Location:read_more.php?id_b=' .$blogId);
        exit();
    } else {
        $error = "Missing information";
    }
}
?>

