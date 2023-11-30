<?php
include '../config.php';
include '../Controller/EventC.php';

$eventC = new EventC();
$events = $eventC->listevents();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements</title>

    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #C0DFEF;
        }

        header {
            
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: stretch;
            text-align: center;
            padding: 20rem;
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
            border: 3px solid #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .event-card:hover {
            transform: scale(1.05);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .event-details {
            padding: 20px;
        }

        .event-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-description {
            font-size: 14px;
            color: #666;
        }

        .event-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .event-actions a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .event-actions a.edit {
            background-color: #3498db;
        }

        .event-actions a.delete {
            background-color: #e74c3c;
        }
    </style>
</head>

<body>
    <h1>Liste des événements</h1>

    <div class="event-container">
        <?php foreach ($events as $event): 
          echo " event: ";?>s
          
            <div class="event-card">
           <!-- <img class="eventimage" src="<?php echo "images/".$event['image_url']; ?>" alt="eventImage">-->
            <img src="../controller/images/event 1.png" >
            <a href="event_details.php?id_event=<?php echo $event['id_e']; ?>">Voir les détails de l'événement</a>



                <div class="event-details">
                    <p class="event-title"><?php echo $event['titre_event']; ?></p>
                    <p class="event-description"><?php echo $event['desc_event']; ?></p>

                    <div class="event-actions">
                        <a class="edit" href="update.php?id_event=<?php echo $event['id_e']; ?>">Modifier</a>
                        <a class="delete" href="delete.php?id_e=<?php echo $event['id_e']; ?>">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="add.php">Ajouter un événement</a>
    
</body>

</html>
