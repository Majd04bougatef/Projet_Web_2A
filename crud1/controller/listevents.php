<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements : </title>
    <link rel="stylesheet" href="../controller/listevents.css">

    <script>
        
    </script>
</head>

<body>
    <div class="container">
        <h1>Liste des événements : </h1>
        <form id="searchForm" method="post">
            <input type="text" name="searchTerm" id="searchInput" placeholder="Rechercher par titre">
            <button type="submit">Rechercher</button>
        </form>

        <div class="event-container">
            <?php
            include '../config.php';
            include '../Controller/EventC.php';

            $eventC = new EventC();

            if (isset($_POST['searchTerm'])) {
                $searchTerm = $_POST['searchTerm'];
                $events = $eventC->searchEvents($searchTerm);
            } else {
                // Si le formulaire n'est pas soumis, affiche tous les événements
                $events = $eventC->listevents();
            }

            foreach ($events as $event):
            ?>
                <div class="event-card">
                    <img class="event-image" src="images/<?php echo isset($event['image']) ? $event['image'] : 'placeholder.jpeg'; ?>" alt="<?php echo isset($event['image']) ? htmlspecialchars($event['image']) : 'eventImage'; ?>">
                    <a href="event_details.php?id_event=<?php echo $event['id_e']; ?>">Voir les détails de l'événement</a>

                    <div class="event-details">
                        <p class="event-title">
                            <?php echo $event['titre_event']; ?>
                        </p>
                        <p class="event-description">
                            <?php echo $event['desc_event']; ?>
                        </p>

                        <div class="event-actions">
                            <a class="edit" href="update.php?id_event=<?php echo $event['id_e']; ?>">Modifier</a>
                            <a class="delete" href="delete.php?id_e=<?php echo $event['id_e']; ?>" onclick="return confirmDeletion();">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="add.php"><button>ajouter un event</button></a>
    </div>
</body>

</html>
