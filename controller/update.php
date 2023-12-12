


<?php
include_once '../config.php';
include_once '../Controller/EventC.php';

session_start();
$error = "";
$event = null;
$eventC = new EventC();

$pdo = config::getConnexion();

if (isset($_GET["id_event"])) {
    $eventId = $_GET["id_event"];
    $event = $eventC->showEvent($eventId);

    if (!$event) {
        $error = "Event not found.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFields = ['titreEvent', 'sujetEvent', 'lieuEvent', 'dateDebutEvent', 'dateFinEvent', 'capacite', 'idUser'];
    $missingFields = [];

    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $missingFields[] = $field;
        }
    }

    if (empty($missingFields)) {
        // Create an associative array with the necessary data
        $eventData = [
            'id_e' => $_POST['id_event'],
            'titre_event' => $_POST['titreEvent'],
            'sujet_event' => $_POST['sujetEvent'], // Assuming this is the correct field name

            'desc_event' => $_POST['descEvent'],
            'lieu_event' => $_POST['lieuEvent'],
            'date_debut_event' => $_POST['dateDebutEvent'],
            'date_fin_event' => $_POST['dateFinEvent'],
            'capacite' => $_POST['capacite'],
            'id_user' => $_POST['idUser'],
            'eventImage' => $_FILES['eventImage']['name']
        ];

        // Update the event
        $eventC->updateEvent($eventData);

        header('Location: listevents.php');
        exit();
    } else {
        $error = "Missing information for fields: " . implode(', ', $missingFields);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https:://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.2.0/css/all.min.css">
    
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Event Creation</title>
    <style>
        
        form {
            margin-top: 10%;
      
        }
        .modal{
            margin-top: 3%;
            margin-left: 30%;
        }

      
        .container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .modal {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            box-shadow: 0 15px 30px 0 rgba(0, 125, 171, 0.15);
            border-radius: 10px;
        }

        .modal__header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal__body {
            padding: 1rem 1rem;
        }

        .modal__footer {
            padding: 0 1.5rem 1.5rem;
        }

        .modal__title {
            font-weight: 700;
            font-size: 1.25rem;
        }

        .button {
            display: inline-flex;
            align-items: centers;
            justify-content: center;
            transition: 0.15s ease;
        }

        .button--icon {
            width: 2.5rem;
            height: 2.5rem;
            background-color: transparent;
            border-radius: 0.25rem;
        }

        .button--icon:focus,
        .button--icon:hover {
            background-color: #ededed;
        }

        .button--primary {
            background-color: #007dab;
            color: #FFF;
            padding: 0.75rem 1.25rem;
            border-radius: 0.25rem;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .button--primary:hover {
            background-color: #006489;
        }

        .input {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.5rem;
        }

        .input__label {
            font-weight: 700;
            font-size: 0.875rem;
        }

        .input__field {
            display: block;
            margin-top: 0.5rem;
            border: 1px solid #DDD;
            border-radius: 0.25rem;
            padding: 0.75rem 0.75rem;
            transition: 0.15s ease;
        }

        .input__field:focus {
            outline: none;
            border-color: #007dab;
            box-shadow: 0 0 0 1px #007dab, 0 0 0 4px rgba(0, 125, 171, 0.3);
        }

        .input__error {
            margin-top: 0.25rem;
            font-size: 0.75rem;
            color: #ff1a1a;
        }
    </style>
     <script>
        function validateDate() {
            var currentDate = new Date();
            var selectedDate = new Date(document.getElementById('eventDate').value);

            if (selectedDate < currentDate) {
                alert('La date de l\'événement ne peut pas être antérieure à aujourd\'hui.');
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="../view/menu_consultation_medecin.php"><img class="imglogo" src="../image/logo/logo.png" alt="logo"></a>
                </span>

                <div class="text header-text">
                    <span class="name">Med<span class="tun">TUN</span></span><br>
                    <span class="profession">Best For Medical</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    
                        <i class="bx bx-search icon"></i>
                        <input type="search" placeholder="Search..">
                    
                </li>

                <ul class="menu-links">
                    <li class="">
                        <a href="../view/calendar.php" >
                            <i class='bx bx-clinic icon'></i>
                            <span class="text nav-text" >Calendar</span>
                        </a>
                    </li>

                   
                    <li class="">
                        <a href="../view/selectionner_dossier_medecin.php">
                            <i class="bx bxs-box icon"></i>
                            <span class="text nav-text">Consulter Dossier</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add.php">
                            <i class="bx bxs-box icon"></i>
                            <span class="text nav-text">Ajouter event</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/calendrier.php">
                            <i class="bx bxs-box icon"></i>
                            <span class="text nav-text">Calendrier event </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/listevents.php">
                            <i class="bx bxs-box icon"></i>
                            <span class="text nav-text">liste event </span>
                        </a>
                    </li>

              
                    
                </ul>
            </div>

            

                <li class="">
                    <a href="logout.php">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>


                <li class="mode">
                    <div class="moon-sun">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>
                    </div>

                    <span class="mod-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <div class="home" id="content">
        <div class="links-menu">
            <nav class="profile">
                    <?php
                    if (isset($_SESSION['user_id']))
                    {
                    ?>

                        <img src="images/<?php echo $_SESSION['image'];?>" class="user-pic" onclick="toggleMenu()">
                    <?php
                    }
                    ?>
                

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                        <?php
                                if (isset($_SESSION['user_id']))
                                {
                                ?>
                                <h1>
                                <img src="images/<?php echo $_SESSION['image'];?>">
                                    <?php echo $_SESSION['nom'];?>
                                </h1>
                                <?php
                                }
                                else{
                                    ?>
                                    <li><a href="#"></a><li>

                                    <?php
                                }
                            ?>
                            
                            
                        </div>
                        <hr>

                        <a href="../view/updateuser.php" class="sub-menu-link">
                            <img src="images/profile.png">
                            <p>Edit Profile</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p>Settings and Privacy</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="images/help.png">
                            <p>Help & Support</p>
                            <span> > </span>
                        </a>

                        <a href="logout.php" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p>Logout</p>
                            <span> > </span>
                        </a>


                    </div>
                </div>

            </nav>
        </div>

        <div class="modal">
            <div class="modal__header">
                <h2 class="modal__title">Update Event</h2>
            </div>
            <div class="modal__body">
                <?php if ($error): ?>
                    <div class="input__error">
                        <?= $error; ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id_event" value="<?php echo $event['id_e']; ?>">
                    <div class="input">
                        <label class="input__label" for="titreEvent">Event Title</label>
                        <input class="input__field" type="text" name="titreEvent" id="titreEvent"
                            value="<?php echo $event['titre_event']; ?>" required>
                    </div>
                    <div class="input">



                        <label class="input__label" for="descEvent">Event Description</label>
                        <input class="input__field" type="text" name="sujetEvent" id="sujetEvent"
                            value="<?php echo $event['sujet_event']; ?>" maxlength="50" required>
                    </div>


                    <div class="input">
                        <label class="input__label" for="lieuEvent">Event Location</label>
                        <input class="input__field" type="text" name="lieuEvent" id="lieuEvent"
                            value="<?php echo $event['lieu_event']; ?>" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="dateDebutEvent">Event Start Date</label>
                        <input class="input__field" type="datetime-local" name="dateDebutEvent" id="dateDebutEvent"
                            value="<?php echo $event['date_debut_event']; ?>" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="dateFinEvent">Event End Date</label>
                        <input class="input__field" type="datetime-local" name="dateFinEvent" id="dateFinEvent"
                            value="<?php echo $event['date_fin_event']; ?>" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="capacite">Event Capacity</label>
                        <input class="input__field" type="number" name="capacite" id="capacite"
                            value="<?php echo $event['capacite']; ?>" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="idUser">User ID</label>
                        <input class="input__field" type="text" name="idUser" id="idUser"
                            value="<?php echo $event['id_user']; ?>" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventImage">Event Image</label>
                        <input class="input__field" type="file" name="eventImage" id="eventImage" accept="image/*">
                    </div>
                    <div class="modal__footer">
                        <button class="button button--primary" type="submit">Update Event</button>
                    </div>
                </form>
            </div>
        </div>



        </p>
     
        <script>
    let subMenu = document.getElementById("subMenu");
    
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>
   
    <script src="../assets/consultation/menu_consultaion.js"></script>

</body>



</html>












