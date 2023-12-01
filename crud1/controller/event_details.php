<?php
session_start();

include_once '../Controller/EventC.php';
include_once '../Controller/CommentC.php';

$eventC = new EventC();
$commentC = new CommentC();

if (isset($_GET["id_event"])) {
    $eventId = $_GET["id_event"];

    $eventDetails = $eventC->showEvent($eventId);
    $comments = $commentC->listCommentsForEvent($eventId);

    ?>

    <div class="container">
        <div class="event-details">
            <h2>
                <?= $eventDetails['titre_event'] ?>
            </h2>
            <p>Date de début :
                <?= $eventDetails['date_debut_event'] ?>
            </p>
            <p>Date de fin :
                <?= $eventDetails['date_fin_event'] ?>
            </p>
            <p>Lieu :
                <?= $eventDetails['lieu_event'] ?>
            </p>
            <p>Capacité :
                <?= $eventDetails['capacite'] ?>
            </p>
        </div>
       
        <title>Sondage</title>
    <!-- Inclure la bibliothèque jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<form id="surveyForm">
    <label for="satisfaction">Satisfaction:</label>
    <select id="satisfaction" name="satisfaction">
        <option value="satisfied">Satisfait</option>
        <option value="neutral">Neutre</option>
        <option value="dissatisfied">Insatisfait</option>
    </select>



    <!-- Utilisation de jQuery pour attacher un gestionnaire d'événement à la soumission du formulaire -->
    <button type="button" onclick="submitSurvey()">Soumettre</button>
</form>

        <div class="comment-section">
            <h3>Commentaires :</h3>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p>Contenu :
                        <?= $comment['contenu'] ?>
                    </p>
                    <p>Date :
                        <?= $comment['date_commentaire'] ?>
                    </p>
                    <p>ID de l'utilisateur :
                        <?= $comment['id_user'] ?>
                    </p>
                    <a class="update-link"
                        href="update_comment_form.php?id_commentaire=<?= $comment['id_commentaire'] ?>&id_event=<?= $eventId ?>"><button>modifier</button></a>
                    <a class="delete-link"
                        href="delete_comment.php?id_commentaire=<?= $comment['id_commentaire'] ?>&id_event=<?= $eventId ?>"><button>Delete</button></a>


                    <hr>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="comment-form">
            <form action="" method="post">
                <textarea id="contenu" name="contenu" rows="4" cols="50" placeholder="Ajouter un commentaire..."
                    required></textarea><br>
                <input type="hidden" name="id_e" value="<?= $eventId ?>">
                <?php
                $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 'MM12345676';
                echo '<input type="hidden" name="id_user" value="' . $id_user . '">';
                ?>

                <input type="submit" value="Ajouter le commentaire">
            </form>
        </div>
    </div>
    

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
} else {
    echo "Event ID not provided.";
}
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #ff8a00, #e52e71, #5f4e80);
            background-size: 200% 200%;
            animation: animateBackground 4s infinite;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .event-details {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: left;
            color: #333;
        }

        .event-details h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
            animation: fadeIn 2s;
        }

        .event-details p {
            margin-bottom: 10px;
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .comment-section {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        .comment {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment p {
            margin-bottom: 8px;
            color: #555;
        }

        .comment hr {
            border: 1px solid #ddd;
            margin: 10px 0;
        }

        .comment-form {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: none;
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

        @keyframes animateBackground {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .ui-btn {
            cursor: pointer;
            border-radius: 5px;
            color: rgb(219, 218, 218);
            border-style: solid;
            background-color: transparent;
            border-color: rgb(219, 218, 218);
            width: 120px;
            height: 40px;
            transition: 0.2s ease;
            text-transform: uppercase;
            border-width: 2px;
            font-weight: 500;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .ui-btn:hover {
            color: rgb(247, 247, 247);
            background-color: rgb(202, 25, 25);
            border-color: rgb(202, 25, 25);
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            box-shadow: 0 0 50px rgb(202, 25, 25), 0 0 30px rgb(202, 25, 25),
                0 0 60px rgb(202, 25, 25), 0 0 120px rgb(202, 25, 25);
            font-size: 20px;
            width: 130px;
            height: 50px;
            letter-spacing: 3px;
        }

        .ui-btn:active {
            width: 115px;
            height: 38px;
            letter-spacing: 0px;
        }

        button {
            font-size: 17px;
            padding: 0.5em 2em;
            border: transparent;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            background: dodgerblue;
            color: white;
            border-radius: 4px;
        }

        button:hover {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(30, 144, 255, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }

        button:active {
            transform: translate(0em, 0.2em);
        }
        
    </style>
</head>
<script>

    function confirmDeletion() {
        return confirm("Voulez-vous vraiment supprimer ce commentaire ?");
    }

    var deleteLinks = document.querySelectorAll('.delete-link');

    deleteLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (!confirmDeletion()) {
                event.preventDefault();
            }
        });
    });
    /*function submitSurvey() {
        var satisfaction = $("#satisfaction").val();
        var commentaire = $("#commentaire").val();
            alert("Sondage soumis ! Merci de votre participation.");
        }*/
        function submitSurvey() {
        var satisfaction = $("#satisfaction").val();
        var commentaire = $("#commentaire").val();

        // Utiliser AJAX pour envoyer les données au serveur (PHP)
        $.ajax({
            type: "POST",
            url: "save_survey.php",  // Nom du fichier PHP côté serveur
            data: {
                satisfaction: satisfaction,
                commentaire: commentaire
            },
            success: function(response) {
                // Gérer la réponse du serveur si nécessaire
                alert("Réponse enregistrée avec succès !");
            },
            error: function(error) {
                console.error("Erreur lors de l'enregistrement de la réponse :", error);
            }
        });
    }
</script>
<body>
<a href="listevents.php?id_event=<?= $eventId ?>"><button>Retour à la liste des événements</button></a>
