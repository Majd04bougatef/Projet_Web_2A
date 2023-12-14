<?php
include_once '../Controller/commentaireC.php';

$error = "";
$commentaireC = new CommentC(); // Ensure the object is created

// Create commentaire
$commentaire = null;
echo 'jkb,n';
if (
    isset($_POST["id_com"]) ||
    isset($_POST["desc_commentaire"])
) {
    echo 'jkb,n';
        $commentaire = new Comment(
            $_POST['id_com'],
            null, // Assuming $blogId is not needed for an update
            new DateTime(),
            $_POST['desc_commentaire']
        );
echo 'jkb,n';
        $commentaireC->updateCommentaire($commentaire, $_POST["id_com"]);
        echo '  aaaa';
        header('Location: read_more.php');
        exit();
  
}

if (isset($_POST['id_com'])) {
    $commentaire = $commentaireC->showCommentaire($_POST['id_com']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
    <style>
        /* Styles remain the same */
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="comment-form">
            <div class="modal">
                <div class="modal__header">
                    <span class="modal__title">Modifier un commentaire</span>
                    <button class="button button--icon" type="button">
                        <svg width="24" viewBox="0 0 24 24" height="24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal__body">
                    <div class="input-group">
                        <!-- label for="date_commentaire" class="input__label">Date du commentaire:</label>
                        <input type="date" id="date_commentaire" name="date_commentaire" class="input__field" value="<?= $commentaire['date_commentaire'] ?? ''; ?>" required -->
                    </div>
                    <div class="input-group">
                        <label for="desc_commentaire" class="input__label">Description du commentaire:</label>
                        <textarea id="desc_commentaire" name="desc_commentaire" class="input__field input__field--textarea" required><?= $commentaire['desc_commentaire'] ?? ''; ?></textarea>
                        <p class="input__description">Donnez une bonne description de votre commentaire</p>
                    </div>
                </div>
                <div class="modal__footer">
                    <button type="submit" class="button button--primary">Mettre à jour</button>
                    <!-- Add any other buttons or actions as needed -->
                </div>
            </div>
            <input type="hidden" name="id_com" value="<?= $_POST['id_com'] ?? ''; ?>">
        </form>
    </div>
</body>

</html>
