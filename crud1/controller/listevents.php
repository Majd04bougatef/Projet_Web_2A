<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements : </title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 100%;
            min-height: 100vh;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        header {
            background-color: #4a90e2;
            color: #fff;
            padding: 5rem 2rem;
            text-align: center;
        }

        h1 {
            color: #4a90e2;
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: bold;
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        .event-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
        }

        .event-card {
            width: 300px;
            border: 3px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background-color: #fff;
        }

        .event-card:hover {
            transform: scale(1.05);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ddd;
        }

        .event-details {
            padding: 20px;
        }

        .event-title {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .event-description {
            font-size: 16px;
            color: #555;
        }

        .event-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .event-actions a {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .event-actions a.edit,
        .event-actions a.delete {
            text-align: center;
        }

        .event-actions a.edit {
            background-color: #1F9FDC;
        }

        .event-actions a.delete {
            background-color: #FC414B;
        }

        .event-actions a.edit:hover,
        .event-actions a.delete:hover {
            filter: brightness(90%);
        }

        /* Style pour le champ de recherche */
        .search-container {
            position: relative;
            margin: 20px 0;
        }

        .search-input {
            width: 300px;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease-in-out;
        }

        .search-input:focus {
            border-color: #3498db;
        }

        .search-button {
            position: absolute;
            top: 50%;
            right: 1075px;
            transform: translateY(-50%);
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        .search-button:hover {
            background-color: #2980b9;
        }

        .add-button {
            background-color: #3498db;
            /* Bleu */
            color: #fff;
            /* Texte blanc */
            padding: 10px 20px;
            /* Espacement intérieur du bouton */
            border: none;
            /* Pas de bordure */
            border-radius: 5px;
            /* Coins arrondis */
            font-size: 16px;
            /* Taille du texte */
            cursor: pointer;
            /* Curseur pointeur au survol */
            transition: background-color 0.3s ease-in-out;
            /* Transition de couleur au survol */
        }

        .add-button:hover {
            background-color: #2980b9;
            /* Bleu plus foncé au survol */
        }



        /* Ajout d'une animation fadeIn */
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }


        /* Ajoutez d'autres styles au besoin */


        .event-card {
            display: block;
        }
    </style>

    <script>
        function confirmDeletion() {
            return confirm("Voulez-vous vraiment supprimer cet événement ?");

        }
        function searchEvents() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();
            var eventCards = document.querySelectorAll('.event-card');

            eventCards.forEach(function (card) {
                var title = card.querySelector('.event-title').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        function filterByDate() {
            var startDate = new Date(document.getElementById('startDate').value);
            var endDate = new Date(document.getElementById('endDate').value);

            console.log("StartDate:", startDate);
            console.log("EndDate:", endDate);

            var eventCards = document.querySelectorAll('.event-card');
            eventCards.forEach(function (card) {
                // Utilisez dataset pour récupérer la date stockée
                var eventDate = new Date(card.dataset.date);

                console.log("EventDate:", eventDate);

                if (eventDate >= startDate && eventDate <= endDate) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }






    </script>
</head>

<body>
    <div class="container">
        <h1>Liste des événements : </h1>
        <div class="search-container">
            <form method="post" action="" onsubmit="searchEvents(); return false;">
                <input type="text" id="searchInput" class="search-input" placeholder="Rechercher par titre">
                <button type="submit" class="search-button">Rechercher</button>
            </form>
            <form method="post" action="">
                <input type="date" id="startDate" name="startDate" placeholder="Date de début">
                <input type="date" id="endDate" name="endDate" placeholder="Date de fin">
                <button type="button" onclick="filterByDate()">Filtrer par date</button>
            </form>



        </div>


        <div class="event-container">
            <?php
            include '../config.php';
            include '../Controller/EventC.php';

            $eventC = new EventC();

            if (isset($_POST['searchTerm'])) {
                $searchTerm = $_POST['searchTerm'];
                $events = $eventC->searchEvents($searchTerm);
            } else {

                $events = $eventC->listevents();
            }

            foreach ($events as $event):
                $date_debut_event = isset($event['date_debut']) ? $event['date_debut'] : '';
                $date_fin_event = isset($event['date_fin']) ? $event['date_fin'] : ''; ?>
                <div class="event-card" data-date="<?php echo $date_debut_event; ?>">
                    <img class="event-image"
                        src="image/<?php echo isset($event['image']) ? $event['image'] : 'placeholder.gif'; ?>"
                        alt="<?php echo isset($event['image']) ? htmlspecialchars($event['image']) : 'eventImage'; ?>">
                    <a href="event_details.php?id_event=<?php echo $event['id_e']; ?>">Voir les détails de l'événement</a>

                    <div class="event-details">
                        <p class="event-title">
                            <?php echo $event['titre_event']; ?>
                        </p>
                        <p class="event-description">
                            <?php echo $event['desc_event']; ?>
                        </p>
                        <p class="event-date">
                            Début :
                            <?php echo $date_debut_event; ?><br>
                            Fin :
                            <?php echo $date_fin_event; ?>
                        </p>



                        <div class="event-actions">
                            <a class="edit" href="update.php?id_event=<?php echo $event['id_e']; ?>">Modifier</a>
                            <a class="delete" href="delete.php?id_e=<?php echo $event['id_e']; ?>"
                                onclick="return confirmDeletion();">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <footer>
            <a href="add.php" class="add-button">Ajouter un événement</a>
        </footer>

    </div>
</body>

</html>