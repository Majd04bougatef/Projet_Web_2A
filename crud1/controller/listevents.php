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
  padding: 12.5px 30px;
  border: 0;
  border-radius: 100px;
  background-color: #2ba8fb;
  color: #ffffff;
  font-weight: Bold;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
}

button:hover {
  background-color: #6fc5ff;
  box-shadow: 0 0 20px #6fc5ff50;
  transform: scale(1.1);
}

button:active {
  background-color: #3d94cf;
  transition: all 0.25s;
  -webkit-transition: all 0.25s;
  box-shadow: none;
  transform: scale(0.98);
}
        
    </style>
</head>

<body>
    <h1>Liste des événements</h1>

    <div class="event-container">
        <?php foreach ($events as $event):
            echo " event: "; ?>s

            <div class="event-card">
                <!-- <img class="eventimage" src="<?php echo "images/" . $event['image_url']; ?>" alt="eventImage">-->
                <img src="../controller/images/event 1.png">
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
                        <a class="delete" href="delete.php?id_e=<?php echo $event['id_e']; ?>">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="add.php"></a><button>
    ajouter un evenement 
</button>

</body>

</html>