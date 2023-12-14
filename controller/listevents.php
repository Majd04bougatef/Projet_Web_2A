
<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements : </title>
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">  
  <link rel="stylesheet" type="text/css" href="../source/page lister medecin/stylecss.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
 
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  
  <link rel="stylesheet" href="https://fonts.gastatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
       

        .container {
            width: 100%;
            min-height: 100vh;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
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
                var eventDate = new Date(card.dataset.date);

                console.log("EventDate:", eventDate);

                if (eventDate.getTime() >= startDate.getTime() && eventDate.getTime() <= endDate.getTime()) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            return false;
        }






    </script>
    <title>Consultation</title>
</head>
<body>
    <?php
        if (substr($_SESSION['user_id'], 0, 1)=='A'){
    ?>
     
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="../view/menu_consultation_admin.php"><img class="imglogo" src="../image/logo/logo.png" alt="logo"></a>
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
                        <a href="../view/calendar_admin.php" >
                            <i class='bx bx-clinic icon'></i>
                            <span class="text nav-text" >Calendar des Médecins </span>
                        </a>
                    </li>

                   
                    <li class="">
                        <a href="../view/selectionner_dossier_admin.php">
                            <i class="bx bx-folder-open icon"></i>
                            <span class="text nav-text">Consulter Dossier Patient</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add.php">
                            <i class="bx bxs-comment-add icon"></i>
                            <span class="text nav-text">Ajouter event</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/calendrier.php">
                            <i class="bx bx-calendar-event icon"></i>
                            <span class="text nav-text">Calendrier event </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/listevents.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">liste event </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/rdvA.php">
                            <i class="bx bxs-cabinet icon"></i>
                            <span class="text nav-text">Consulter RDV</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/category.php">
                            <i class="bx bxs-comment-add icon"></i>
                            <span class="text nav-text">Ajouter categorie</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add_blog.php">
                            <i class="bx bxl-blogger icon"></i>
                            <span class="text nav-text">Ajouter Blog</span>
                        </a>
                    </li>
                    

                    <li class="">
                        <a href="../controller/listeblog.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">Lister Blog</span>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>

            

                <li class="">
                    <a href="../view/logout.php">
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

                        <img src="../view/images/<?php echo $_SESSION['image'];?>" class="user-pic" onclick="toggleMenu()">
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
                                <img src="../view/images/<?php echo $_SESSION['image'];?>">
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
                            <img src="../view/images/profile.png">
                            <p>Edit Profile</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="../view/images/setting.png">
                            <p>Settings and Privacy</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="../view/images/help.png">
                            <p>Help & Support</p>
                            <span> > </span>
                        </a>

                        <a href="logout.php" class="sub-menu-link">
                            <img src="../view/images/logout.png">
                            <p>Logout</p>
                            <span> > </span>
                        </a>


                    </div>
                </div>

            </nav>
        </div>
        <section class="attendance">
        <h1>Liste des événements : </h1>
        <!--<div class="search-container">
            <form method="post" action="" onsubmit="searchEvents(); return false;">
                <input type="text" id="searchInput" class="search-input" placeholder="Rechercher par titre">
                <button type="submit" class="search-button">Rechercher</button>
            </form>
            <form method="post" action="" onsubmit="filterByDate(); return false;">
                <input type="date" id="startDate" name="startDate" placeholder="Date de début">
                <input type="date" id="endDate" name="endDate" placeholder="Date de fin">
                <button type="button" onclick="filterByDate()">Filtrer par date</button>
            </form>
        </div>-->
        <div class="attendance-list">
          <h1></h1><br>
        <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>titre event</th>
                <th>sujet event</th>
                <th>date debut</th>
                <th>date fin</th>
                <th>Modifier event</th>
                <th>supprimer event</th>
                <th>détails</th>
              </tr>
            </thead>
            <tbody>

            <?php
            include '../config.php';
            include '../Controller/EventC.php';
            
            $eventC = new EventC();

            if (isset($_POST['searchTerm'])) {
                $searchTerm = $_POST['searchTerm'];
                $events = $eventC->searchEvents($searchTerm);
            } else {
                
                    
                    $events = $eventC->listEvents();
            }

            foreach ($events as $event) {
                $date_debut_event = isset($event['date_debut']) ? $event['date_debut'] : '';
                $date_fin_event = isset($event['date_fin']) ? $event['date_fin'] : ''; ?>

                <tr>
                    <td><img width="100px" height="100px" src="../controller/<?php echo isset($event['image']) ? $event['image'] : ''; ?>"></td>
                    
                    <th><?php echo $event['titre_event']; ?></th>
                    <th><?php echo $event['sujet_event'];?></th>
                    <th><?php echo $event['date_debut_event'];?></th>
                    <th><?php echo $event['date_fin_event'];?></th>
                    
                    <td><input type="hidden" name="id_b"  value="<?php echo $event['id_e'];?>"><button><a href="../controller/update.php?id_e=<?php echo $event['id_e'];?>">Modifier Event</a></button></td>
                    <td><a href="#" onclick="confirmDelete(<?php echo $event['id_e']; ?>)"><button>Supprimer</button></a></td>
                    <td><a href="event_details.php?id_event=<?php echo $event['id_e']; ?>"><button>Voir les détails de l'événement</button></a></td>
                </tr>
            <?php
                }
            ?>   

            </tbody>
          </table>
        </div>
    </section>
    

    <script>


function confirmDelete(id_b) {
                Swal.fire({
                    title: 'Voulez-vous vraiment supprimer ce rdv?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer!',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "../controller/delete.php",
                            data: { id_b: id_b },
                            dataType: 'json', 
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success ',
                                        title: 'Suppression réussie!',
                                        text: 'Les données ont été supprimées avec succès.'
                                    });
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erreur',
                                        text: response.message
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Erreur lors de l'envoi de la requête AJAX", error);
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            }

</script>
    </div>

    <script>
    let subMenu = document.getElementById("subMenu");
    
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>
    <script src="../assets/consultation/menu_consultaion.js"></script>


    <?php
        }
        else{
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    

   
    <title>Consultation</title>
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
                            <i class="bx bx-folder-open icon"></i>
                            <span class="text nav-text">Consulter Dossier</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add_event.php">
                            <i class="bx bxs-comment-add icon"></i>
                            <span class="text nav-text">Ajouter event</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/calendrier.php">
                            <i class="bx bx-calendar-event icon"></i>
                            <span class="text nav-text">Calendrier event </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/listevents.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">liste event </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/rdvM.php">
                            <i class="bx bxs-cabinet icon"></i>
                            <span class="text nav-text">Consulter RDV </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add_blog_med.php">
                            <i class="bx bxs-comment-add icon"></i>
                            <span class="text nav-text">Ajouter Blog</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/listeblog_med.php">
                            <i class="bx bxl-blogger icon"></i>
                            <span class="text nav-text">Lister Blog</span>
                        </a>
                    </li>

              
                    
                </ul>
            </div>

            
            <div class="bottom-content">
                <li class="">
                    <a href="../view/logout.php">
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

                        <img src="../view/images/<?php echo $_SESSION['image'];?>" class="user-pic" onclick="toggleMenu()">
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
                                <img src="../view/images/<?php echo $_SESSION['image'];?>">
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
                            <img src="../view/images/profile.png">
                            <p>Edit Profile</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="../view/images/setting.png">
                            <p>Settings and Privacy</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="../view/images/help.png">
                            <p>Help & Support</p>
                            <span> > </span>
                        </a>

                        <a href="../view/logout.php" class="sub-menu-link">
                            <img src="../view/images/logout.png">
                            <p>Logout</p>
                            <span> > </span>
                        </a>


                    </div>
                </div>

            </nav>
        </div>
        <section class="attendance">
        <h1>Liste des événements : </h1>
        <!--<div class="search-container">
            <form method="post" action="" onsubmit="searchEvents(); return false;">
                <input type="text" id="searchInput" class="search-input" placeholder="Rechercher par titre">
                <button type="submit" class="search-button">Rechercher</button>
            </form>
            <form method="post" action="" onsubmit="filterByDate(); return false;">
                <input type="date" id="startDate" name="startDate" placeholder="Date de début">
                <input type="date" id="endDate" name="endDate" placeholder="Date de fin">
                <button type="button" onclick="filterByDate()">Filtrer par date</button>
            </form>
        </div>-->
        <div class="attendance-list">
          <h1></h1><br>
        <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>titre event</th>
                <th>sujet event</th>
                <th>date debut</th>
                <th>date fin</th>
                <th>Modifier event</th>
                <th>supprimer event</th>
                <th>détails</th>
              </tr>
            </thead>
            <tbody>

            <?php
            include '../config.php';
            include '../Controller/EventC.php';
            
            $eventC = new EventC();

            if (isset($_POST['searchTerm'])) {
                $searchTerm = $_POST['searchTerm'];
                $events = $eventC->searchEvents($searchTerm);
            } else {
                
                    
                    $events = $eventC->listEvents();
            }

            foreach ($events as $event) {
                $date_debut_event = isset($event['date_debut']) ? $event['date_debut'] : '';
                $date_fin_event = isset($event['date_fin']) ? $event['date_fin'] : ''; ?>

                <tr>
                    <td><img width="100px" height="100px" src="../controller/<?php echo isset($event['image']) ? $event['image'] : ''; ?>"></td>
                    
                    <th><?php echo $event['titre_event']; ?></th>
                    <th><?php echo $event['sujet_event'];?></th>
                    <th><?php echo $event['date_debut_event'];?></th>
                    <th><?php echo $event['date_fin_event'];?></th>
                    
                    <td><input type="hidden" name="id_b"  value="<?php echo $event['id_e'];?>"><button><a href="../controller/update.php?id_e=<?php echo $event['id_e'];?>">Modifier Event</a></button></td>
                    <td><a href="#" onclick="confirmDelete(<?php echo $event['id_e']; ?>)"><button>Supprimer</button></a></td>
                    <td><a href="event_details.php?id_event=<?php echo $event['id_e']; ?>"><button>Voir les détails de l'événement</button></a></td>
                </tr>
            <?php
                }
            ?>   

            </tbody>
          </table>
        </div>
    </section>
    

    <script>


function confirmDelete(id_b) {
                Swal.fire({
                    title: 'Voulez-vous vraiment supprimer ce rdv?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer!',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "../controller/delete.php",
                            data: { id_b: id_b },
                            dataType: 'json', 
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success ',
                                        title: 'Suppression réussie!',
                                        text: 'Les données ont été supprimées avec succès.'
                                    });
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erreur',
                                        text: response.message
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Erreur lors de l'envoi de la requête AJAX", error);
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            }

</script>
    </div>


    </div>

    <script>
    let subMenu2 = document.getElementById("subMenu");
    
    function toggleMenu(){
        subMenu2.classList.toggle("open-menu");
    }
</script>
    <script src="../assets/consultation/menu_consultaion.js"></script>


    <?php
        }
    ?>
</body>
</html>
</body>
</html>