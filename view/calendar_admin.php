<?php
include_once '../controller/consultationR.php';
$consultR = new consultationfunction();


if (isset($_POST['date'])) {
  $selectedDate = $_POST['date'];
  $list_Monday = $consultR->listRendez_vous_calendar_Monday_admin($selectedDate, $_POST['medecin']);
  $list_Tuesday = $consultR->listRendez_vous_calendar_Tuesday_admin($selectedDate, $_POST['medecin']);
  $list_Wednesday = $consultR->listRendez_vous_calendar_Wednesday_admin($selectedDate, $_POST['medecin']);
  $list_Thursday = $consultR->listRendez_vous_calendar_Thursday_admin($selectedDate, $_POST['medecin']);
  $list_Friday = $consultR->listRendez_vous_calendar_Friday_admin($selectedDate, $_POST['medecin']);
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
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <link rel="stylesheet" href="../assets/calendar/style.css">

</style>
</head>

<body>


<a href="../view/menu_consultation.php"><i class='bx bx-menu' style="font-size: 50px; color: black;"></i></a>

  <form method="post" action="" id="calendarForm">
    <div class="name-med" style="text-align: center;">
      <h1 style="font-size: 4em;  color: #333;  font-weight: bold; text-align: center;  margin-bottom: 20px; ">Calendar</h1>
      <br>

      <div style="display: flex; align-items:center; margin-left: 10%;">
        Spécialité : <select name="specialité" id="specialiteSelect">
          <option value="">Sélectionner une Spécialité</option>
          <option value="generaliste">Géneraliste</option>
          <option value="psychiatre">Psychiatre</option>
          <option value="cardiologe">Cardiologe</option>

        </select>
       
<script>
  function updateMedecinList() {
    var selectedSpecialite = document.getElementById('specialiteSelect').value;

    $.ajax({
      type: 'POST',
      url: '../controller/listerMedecinCalendarAdmin.php',
      data: { specialité: selectedSpecialite },
      success: function(response) {
        $('#medecinListContainer').html(response);
      },
      error: function() {
        alert('Erreur lors de la mise à jour de la liste déroulante');
      }
    });
  }

  document.getElementById('specialiteSelect').addEventListener('change', function() {
    updateMedecinList();
  });

</script>
       
         Médecin : <div id="medecinListContainer">
         <select name="medecin">
          <option value="">Sélectionner Médecin</option>
         </select>
         </div>
        <h4>Semaine :
          <input type="date" name="date" id="datePicker">
          <input type="submit" value="Afficher" style="padding: 10px 20px;  font-size: 16px;  font-weight: bold;  text-transform: uppercase;  background-color: #0077B6; color: #fff;   border: none;  border-radius: 5px; cursor: pointer;">
        </h4>
      </div>
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
    <script src="../assets/calendar/calendar.js"> </script>

</body>

</html>