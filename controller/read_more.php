<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <title>Blog with Comments</title>
    <style>
        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            text-align: center; /* Ajout pour centrer l'image */
        }

        .container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
            margin-bottom: 10px; /* Ajout pour un espacement en bas */
        }

        h1, h2, p {
            color: #343a40;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        #comment-section {
            margin-top: 20px;
            max-height: 200px;
            overflow: auto;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
        }

        .comment {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .comment a {
            color: #dc3545;
            margin-left: 10px;
        }

        .comment a:hover {
            text-decoration: underline;
        }

        .comment p {
            margin: 0;
        }

        .comment p strong {
            color: #007bff;
        }

        .comment-form {
            margin-top: 20px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .comment-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #343a40;
        }

        .comment-form input[type="text"],
        .comment-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .comment-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .comment-form textarea {
            resize: vertical;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            margin-right: 5px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #0056b3;
        }

        .comment p {
            margin: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Nombre de lignes à afficher */
            -webkit-box-orient: vertical;
        }

        /* Styles modernes pour les détails du blog */
        .container {
            background-color: #f8f9fa;
        }

        .container h1 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        .container p {
            color: #343a40;
            margin-bottom: 15px;
        }

        #comment-section {
            background-color: #fff;
            width: 80%;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            margin-left: 10%;
            max-height: 200px;
            overflow: auto;
        }

        .comment-form {
            background-color: #fff;
            width: 50%;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-left: 25%;
            margin-top: 20px;
        }

        .comment-form h2 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .comment-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #343a40;
        }

        .comment-form input[type="text"],
        .comment-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .comment-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .comment-form textarea {
            resize: vertical;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Include your PHP logic here
        include_once 'blogC.php';
        include_once 'CommentaireC.php';

        $blogC = new BlogC();
        $commentC = new CommentC();

        // Assuming you have the blog ID from the URL or any other source
        if (isset($_GET['id_b'])) {
            $blogId = $_GET['id_b'];
            $blogDetails = $blogC->getBlogDetails($blogId);
            $comments = $commentC->getCommentsForBlog($blogId);

            // Display blog details
            echo "<h1>{$blogDetails['titre_blog']}</h1>";
            echo "<img width='400px' height='100px' src='{$blogDetails['image']}' alt='{$blogDetails['titre_blog']}' style='max-width: 100%; height: auto;'>";
            echo "<p>{$blogDetails['sujet_blog']}</p>";
            echo "<p>{$blogDetails['desc_blog']}</p>";

            // Display comments
            echo "<h2>Commentaires</h2>";
            echo "<div id='comment-section'>";

            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    echo "<div class='comment'>";
                    echo "<p><strong>{$comment['nom']}</strong> | <strong>Date:</strong> {$comment['date_commentaire']}</p>";
                    echo "<p>{$comment['desc_commentaire']}</p>";
                    // Delete button for the comment
                    echo "<a href='delete_comment.php?comment_id={$comment['id_com']}&id_b={$blogId}'><i class='bx bx-comment-x'></i></a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No comments yet.</p>";
            }

            echo "</div>"; // Close comment-section div

            // Comment form (outside comment-section)
            echo "<div class='comment-form'>";
            echo "<h2>Ajouter un commentaire</h2>";
            echo "<form action='../controller/add__commentaire.php' method='post'>";
            echo "<label for='username'>Votre Nom:</label><br>";
            echo "<input type='text' name='username'>";
            echo "<label for='desc_commentaire'>Commentaire:</label><br>";
            echo "<textarea id='desc_commentaire' name='desc_commentaire' rows='4' cols='50' required></textarea><br>";

            // Hidden input to store the blog ID
            echo "<input type='hidden' name='id_b' value='{$blogId}'>";

            echo "<input type='submit' value='Ajouter un commentaire'>";
            echo "</form>";
            echo "</div>"; // Close comment-form div
        } else {
            echo "Blog ID not provided.";
        }
        ?>
    </div>
</body>

</html>
