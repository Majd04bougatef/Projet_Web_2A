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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="../controller/event_details.css">
    <!-- Inclure la bibliothèque jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../controller/event_details.js"></script>
</head>

<body>
   
    <header>
    
    </header>

    <div class="container">

        <div class="event-details">
            <h2><?= $eventDetails['titre_event'] ?></h2>
            <p>Capacité : <?= $eventDetails['capacite'] ?></p>
            <p>description : <?= $eventDetails['sujet_event'] ?></p>
            <p>Date de fin : <?= $eventDetails['date_fin_event'] ?></p>
            <p>Lieu : <?= $eventDetails['lieu_event'] ?></p>
            <p>Capacité : <?= $eventDetails['capacite'] ?></p>
            
        </div>

        <div class="comment-section">
            <h3>Commentaires :</h3>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p>Contenu : <?= $comment['contenu'] ?></p>
                    <p>Date : <?= $comment['date_commentaire'] ?></p>
                    <p>ID de l'utilisateur : <?= $comment['id_user'] ?></p>
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
                <textarea id="contenu" name="contenu" rows="4" cols="50" placeholder="Ajouter un commentaire..." required></textarea><br>
                <input type="hidden" name="id_e" value="<?= $eventId ?>">
                <?php
                $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 'MM12345676';
                echo '<input type="hidden" name="id_user" value="' . $id_user . '">';
                ?>
                <input type="submit" value="Ajouter le commentaire">
            </form>
        </div>
            

        
    <footer>
        <a href="calendrier.php?id_event=<?= $eventId ?>"><button>Retour à la liste des événements</button></a>

        <a href="../view/index.php?id_event=<?= $eventId ?>"><button>Retour à l'Acceuil</button></a>
    </footer>

    </div>

 
</body>

</html>

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

