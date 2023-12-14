<?php

session_start();



include_once '../controller/consultationR.php';
$consultR = new consultationfunction();

if (!isset($_POST['date'])) {
  $selectedDate = date('Y-m-d');
  $list_Monday = $consultR->listRendez_vous_calendar_Monday($selectedDate,$_SESSION['user_id']);
  $list_Tuesday = $consultR->listRendez_vous_calendar_Tuesday($selectedDate,$_SESSION['user_id']);
  $list_Wednesday = $consultR->listRendez_vous_calendar_Wednesday($selectedDate,$_SESSION['user_id']);
  $list_Thursday = $consultR->listRendez_vous_calendar_Thursday($selectedDate,$_SESSION['user_id']);
  $list_Friday = $consultR->listRendez_vous_calendar_Friday($selectedDate,$_SESSION['user_id']);
 
} else {
  $selectedDate = $_POST['date'];

  $list_Monday = $consultR->listRendez_vous_calendar_Monday($selectedDate,$_SESSION['user_id']);
  $list_Tuesday = $consultR->listRendez_vous_calendar_Tuesday($selectedDate,$_SESSION['user_id']);
  $list_Wednesday = $consultR->listRendez_vous_calendar_Wednesday($selectedDate,$_SESSION['user_id']);
  $list_Thursday = $consultR->listRendez_vous_calendar_Thursday($selectedDate,$_SESSION['user_id']);
  $list_Friday = $consultR->listRendez_vous_calendar_Friday($selectedDate,$_SESSION['user_id']);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
  <link rel="stylesheet" href="https://fonts.gastatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap">
  <link rel="stylesheet" href="../assets/calendar/style.css">

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

        <div class="calender">
        
    <form method="post" action="" style="text-align: center; margin: 0 auto;">
        <div class="name-med">
            <h1 style="font-size: 4em; color: #333; font-weight: bold; margin-bottom: 20px;">Calendar</h1>
            <br>
            <h4 style="font-size: 2em; color: #333; font-weight: bold;">Semaine :
                <input type="date" name="date" id="datePicker">
                <input type="submit" value="Afficher" style="padding: 10px 20px; font-size: 20px; font-weight: bold; text-transform: uppercase; background-color: #0077B6; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
            </h4>
        </div>
    </form>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var currentDate = new Date().toISOString().slice(0, 10);
      document.getElementById('datePicker').value = currentDate;
    });
  </script>

  <div class="calendar">
    <div class="timeline">
      <div class="spacer"></div>
      <div class="time-marker">9 AM</div>
      <div class="time-marker">10 AM</div>
      <div class="time-marker">11 AM</div>
      <div class="time-marker">12 PM</div>
      <div class="time-marker">1 PM</div>
      <div class="time-marker">2 PM</div>
      <div class="time-marker">3 PM</div>
      <div class="time-marker">4 PM</div>
      <div class="time-marker">5 PM</div>
      <div class="time-marker">6 PM</div>
    </div>
    <div class="days">
      <div class="day mon">
        <div class="date">
          <p id="date-num1" class="date-num">9</p>
          <p class="date-day">Mon</p>
        </div>
        <div class="events">
          <?php
          if (isset($list_Monday)) {
            foreach ($list_Monday as $rdv) {

          ?>

              <div class="event start-<?php echo $rdv['deb_rdv']; ?> end-<?php echo $rdv['fin_rdv']; ?> <?php if ($rdv['id_categorie'] == '1') { ?>corp-fi<?php } else if ($rdv['id_categorie'] == '2') { ?>ent-law<?php } else if ($rdv['id_categorie'] == '3') { ?>writing<?php } else if ($rdv['id_categorie'] == '4') { ?>securities<?php } else { ?>ssecurities<?php } ?>">
                <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>">
                  <p class="title"><?php echo $rdv['nom'] . '     ' . $rdv['prenom']; ?></p>
                  <p class="time"><?php echo $rdv['deb_rdv']; ?> PM - <?php echo $rdv['fin_rdv']; ?> PM</p>
                </a>
                <?php
                if ($rdv['statut'] == 1) {
                  echo '<i class="bx bxs-check-circle" style=" marign top:10px; margin-left:5%;color:white; font-size:20px;"></i>';
                }
                ?>
              </div>

          <?php
            }
          }
          ?>
        </div>
      </div>


      <div class="day tues">
        <div class="date">
          <p id="date-num2" class="date-num">10</p>
          <p class="date-day">Tues</p>
        </div>
        <div class="events">
          <?php
          if (isset($list_Tuesday)) {
            foreach ($list_Tuesday as $rdv) {
          ?>

              <div class="event start-<?php echo $rdv['deb_rdv']; ?> end-<?php echo $rdv['fin_rdv']; ?> <?php if ($rdv['id_categorie'] == '1') { ?>corp-fi<?php } else if ($rdv['id_categorie'] == '2') { ?>ent-law<?php } else if ($rdv['id_categorie'] == '3') { ?>writing<?php } else if ($rdv['id_categorie'] == '4') { ?>securities<?php } else { ?>ssecurities<?php } ?>">
                <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>">
                  <p class="title"><?php echo $rdv['nom'] . '     ' . $rdv['prenom']; ?></p>
                  <p class="time"><?php echo $rdv['deb_rdv']; ?> AM - <?php echo $rdv['fin_rdv']; ?> PM</p>
                </a>

                <?php
                if ($rdv['statut'] == 1) {
                  echo '<i class="bx bxs-check-circle" style=" marign top:10px; margin-left:5%;color:white; font-size:20px;"></i>';
                }
                ?>
              </div>

          <?php
            }
          }
          ?>
        </div>
      </div>


      <div class="day wed">
        <div class="date">
          <input type="hidden" class="hiddenDateField" name="date_Wednesday" value="">
          <p id="date-num3" class="date-num">11</p>
          <p class="date-day">Wed</p>
        </div>
        <div class="events">
          <?php
          if (isset($list_Wednesday)) {
            foreach ($list_Wednesday as $rdv) {
          ?>
              <div class="event start-<?php echo $rdv['deb_rdv']; ?> end-<?php echo $rdv['fin_rdv']; ?> <?php if ($rdv['id_categorie'] == '1') { ?>corp-fi<?php } else if ($rdv['id_categorie'] == '2') { ?>ent-law<?php } else if ($rdv['id_categorie'] == '3') { ?>writing<?php } else if ($rdv['id_categorie'] == '4') { ?>securities<?php } else { ?>ssecurities<?php } ?>">
                <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>">
                  <p class="title"><?php echo $rdv['nom'] . '     ' . $rdv['prenom']; ?></p>
                  <p class="time"><?php echo $rdv['deb_rdv']; ?> AM - <?php echo $rdv['fin_rdv']; ?> PM</p>
                </a>

                <?php
                if ($rdv['statut'] == 1) {
                  echo '<i class="bx bxs-check-circle" style=" marign top:10px; margin-left:5%;color:white; font-size:20px;"></i>';
                }
                ?>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>


      <div class="day thurs">
        <div class="date">
          <input type="hidden" class="hiddenDateField" name="date_Thursday" value="">
          <p id="date-num4" class="date-num">12</p>
          <p class="date-day">Thurs</p>
        </div>
        <div class="events">
          <?php
          if (isset($list_Thursday)) {
            foreach ($list_Thursday as $rdv) {
          ?>
              <div class="event start-<?php echo $rdv['deb_rdv']; ?> end-<?php echo $rdv['fin_rdv']; ?> <?php if ($rdv['id_categorie'] == '1') { ?>corp-fi<?php } else if ($rdv['id_categorie'] == '2') { ?>ent-law<?php } else if ($rdv['id_categorie'] == '3') { ?>writing<?php } else if ($rdv['id_categorie'] == '4') { ?>securities<?php } else { ?>ssecurities<?php } ?>">
                <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>">
                  <p class="title"><?php echo $rdv['nom'] . '     ' . $rdv['prenom']; ?></p>
                  <p class="time"><?php echo $rdv['deb_rdv']; ?> AM - <?php echo $rdv['fin_rdv']; ?> PM</p>
                </a>
                <?php
                if ($rdv['statut'] == 1) {
                  echo '<i class="bx bxs-check-circle" style=" marign top:10px; margin-left:5%;color:white; font-size:20px;"></i>';
                }
                ?>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>


      <div class="day fri">
        <div class="date">
          <input type="hidden" class="hiddenDateField" name="date_Friday" value="">

          <p id="date-num5" class="date-num">13</p>
          <p class="date-day">Fri</p>
        </div>
        <div class="events">
          <?php
          if (isset($list_Friday)) {
            foreach ($list_Friday as $rdv) {
          ?>
              <div class="event start-<?php echo $rdv['deb_rdv']; ?> end-<?php echo $rdv['fin_rdv']; ?> <?php if ($rdv['id_categorie'] == '1') { ?>corp-fi<?php } else if ($rdv['id_categorie'] == '2') { ?>ent-law<?php } else if ($rdv['id_categorie'] == '3') { ?>writing<?php } else if ($rdv['id_categorie'] == '4') { ?>securities<?php } else { ?>ssecurities<?php } ?>">
                <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>">
                  <p class="title"><?php echo $rdv['nom'] . '     ' . $rdv['prenom']; ?></p>
                  <p class="time"><?php echo $rdv['deb_rdv']; ?> AM - <?php echo $rdv['fin_rdv']; ?> PM</p>
                </a>
                <?php
                if ($rdv['statut'] == 1) {
                  echo '<i class="bx bxs-check-circle" style=" marign top:10px; margin-left:5%;color:white; font-size:20px;"></i>';
                }
                ?>
              </div>

          <?php
            }
          }
          ?>
        </div>

</div>
</div>
</div>
<script src="../assets/calendar/calendar.js"> </script>
    </div>

    <script>
    let subMenu = document.getElementById("subMenu");
    
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>
    <script src="../assets/consultation/menu_consultaion.js"></script>

</body>
</html>