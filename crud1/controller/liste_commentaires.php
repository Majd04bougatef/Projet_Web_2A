
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commentaires</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .comment {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment p {
            margin: 0;
            padding: 5px 0;
        }

        .comment strong {
            color: #333;
        }
    </style>
</head>

<body>
    <h2>Liste des Commentaires</h2>

    <?php
    include_once '../Controller/CommentC.php';

    $commentC = new CommentC();

    // Récupérer la liste des commentaires depuis la base de données
    $comments = $commentC->listComments();

    // Afficher la liste des commentaires
    foreach ($comments as $comment) {
        echo "<div class='comment'>";
        echo "<p><strong>Contenu:</strong> " . $comment['contenu'] . "</p>";
        echo "<p><strong>Date:</strong> " . $comment['date_commentaire'] . "</p>";
        echo "<p><strong>ID de l'événement:</strong> " . $comment['id_e'] . "</p>";
        echo "<p><strong>ID de l'utilisateur:</strong> " . $comment['id_user'] . "</p>";
        echo "</div>";
    }
    ?>

    <!-- Ajoutez d'autres éléments HTML ou du code PHP au besoin -->

</body>

</html>
