<?php
include_once '../Controller/blogC.php';
include_once '../Controller/commentaireC.php';

$blogC = new BlogC();
$commentC = new CommentC();

if (isset($_GET['id_b'])) {
    $blogId = $_GET['id_b'];
    $blogDetails = $blogC->getBlogDetails($blogId);
    $comments = $commentC->getCommentsForBlog($blogId);

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>{$blogDetails['titre_blog']}</title>";
    echo "<style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                width: 80%;
                margin: auto;
            }

            h1, h2, p {
                color: #333;
            }

            ul {
                list-style-type: none;
                padding: 0;
            }

            li {
                margin-bottom: 15px;
            }

            a {
                color: #3498db;
                text-decoration: none;
            }
        </style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    echo "<h1>{$blogDetails['titre_blog']}</h1>";

    // Ajout de la balise img pour afficher l'image
    echo "<img src='{$blogDetails['image']}' alt='{$blogDetails['titre_blog']}' style='max-width: 100%; height: auto;'>";
    echo "<p>{$blogDetails['sujet_blog']}</p>";
echo "<p>{$blogDetails['desc_blog']}</p>";
    
if (!empty($comments)) {
        echo "<h2>Comments</h2>";
        echo "<ul>";
        foreach ($comments as $comment) {
            echo "<li>{$comment['desc_commentaire']}";
            echo " <a href='read_more.php?id_b={$blogId}&edit_comment={$comment['id_com']}'>Edit</a>";
            echo " <a href='read_more.php?id_b={$blogId}&delete_comment={$comment['id_com']}'>Delete</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No comments yet.</p>";
    }

    // Comment form
    ?>
    <h2>Add a Comment</h2>
    <form action="" method="post">
        <label for="desc_commentaire">Comment:</label><br>
        <textarea id="desc_commentaire" name="desc_commentaire" rows="4" cols="50" required></textarea><br>

        <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">

        <input type="submit" value="Add Comment">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $commentaire = new Comment(
            null,
            $blogId,
            new DateTime(),
            $_POST['desc_commentaire']
        );
        $commentC->addCommentaire($commentaire);

        header("Location: read_more.php?id_b={$blogId}");
        exit();
    }

    // Update comment form
    if (isset($_GET['edit_comment'])) {
        $commentId = $_GET['edit_comment'];
        $commentToEdit = $commentC->showCommentaire($commentId);

        ?>
        <h2>Edit Comment</h2>
        <form action="" method="post">
            <label for="desc_commentaire_edit">Edit Comment:</label><br>
            <textarea id="desc_commentaire_edit" name="desc_commentaire_edit" rows="4" cols="50" required><?= $commentToEdit['desc_commentaire'] ?? ''; ?></textarea><br>

            <input type="hidden" name="comment_id_edit" value="<?= $commentId; ?>">

            <input type="submit" value="Update Comment">
        </form>
        <?php
    }

    // Process comment update
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_id_edit'])) {
        $editedComment = new Comment(
            null,
            null,
            new DateTime(),
            $_POST['desc_commentaire_edit']
        );

        $commentC->updateCommentaire($editedComment, $_POST['comment_id_edit']);
        header("Location: read_more.php?id_b={$blogId}");
        exit();
    }

    // Process comment delete
    if (isset($_GET['delete_comment'])) {
        $commentIdToDelete = $_GET['delete_comment'];
        $commentC->deleteCommentaire($commentIdToDelete);
        header("Location: read_more.php?id_b={$blogId}");
        exit();
    }

    echo "<a href='fichier.pdf' download='article.pdf'>Télécharger le PDF</a>";

    echo "</div>"; 
    echo "<a href='listeblog.php'><button>Liste des Blogs</button></a>"; 
    
    echo "</body>";
    echo "</html>";

} else {
    echo "Blog ID not provided.";
}
?>