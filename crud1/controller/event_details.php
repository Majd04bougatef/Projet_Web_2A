<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        h3 {
            color: #555;
            margin-top: 20px;
        }

        p {
            color: #666;
            line-height: 1.6;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .comment {
            margin-top: 20px;
            padding: 15px;
            background-color: #f2f2f2;
            border-radius: 6px;
        }

        .comment p {
            margin-bottom: 10px;
        }

        .comment hr {
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <?php
    session_start();

    include_once '../Controller/EventC.php';
    include_once '../Controller/CommentC.php';

    $eventC = new EventC();
    $commentC = new CommentC();

    if (isset($_GET["id_event"])) {
        $eventId = $_GET["id_event"];

        $eventDetails = $eventC->showEvent($eventId);

        echo "<div class='container'>";
        echo "<h2>" . $eventDetails['titre_event'] . "</h2>";
        echo "<p>Date de début : " . $eventDetails['date_debut_event'] . "</p>";
        echo "<p>Date de fin : " . $eventDetails['date_fin_event'] . "</p>";
        echo "<p>Lieu : " . $eventDetails['lieu_event'] . "</p>";
        echo "<p>Capacité : " . $eventDetails['capacite'] . "</p>";

        $comments = $commentC->listCommentsForEvent($eventId);

        if (!empty($comments)) {
            echo "<h3>Commentaires :</h3>";
            foreach ($comments as $comment) {
                echo "<div class='comment'>";
                echo "<p>Contenu : " . $comment['contenu'] . "</p>";
                echo "<p>Date : " . $comment['date_commentaire'] . "</p>";
                echo "<p>ID de l'événement : " . $comment['id_e'] . "</p>";
                echo "<p>ID de l'utilisateur : " . $comment['id_user'] . "</p>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun commentaire pour cet événement.</p>";
        }


        ?>
        <form action="" method="post">
            <label for="contenu">Contenu du commentaire:</label><br>
            <textarea id="contenu" name="contenu" rows="4" cols="50" required></textarea><br>

            <!-- Champ caché pour l'ID de l'événement -->
            <input type="hidden" name="id_e" value="<?php echo $eventId; ?>">

            <?php
            if (isset($_SESSION['id_user'])) {
                $id_user = $_SESSION['id_user'];
            } else {
                $id_user = 'MM12345676';
            }

            echo '<input type="hidden" name="id_user" value="' . $id_user . '">';
            ?>

            <input type="submit" value="Ajouter le commentaire">
        </form>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            $contenu = $_POST["contenu"];
            $date_commentaire = date("Y-m-d H:i:s"); 

            
            $id_e = $_POST["id_e"];

           
            $id_user = $_POST["id_user"];

          
            $comment = new Comment(null, $contenu, $date_commentaire, $id_e, $id_user);

    
            $commentC->addComment($comment);

           
            header('Location: event_details.php?id_event=' . $eventId);
            exit();
        }

        echo "</div>"; 
    } else {
        echo "Event ID not provided.";
    }
    ?>

</body>

</html>
