<?php
include_once '../controller/consultationR.php';
$consultR = new consultationfunction();
$id_user = $_GET["id_user"] ?? "";

session_start();
if(isset($_POST['date'])){
  
 
    $selectedDate = $_POST['date'];
    $list_Monday = $consultR->listRendez_vous_calendar_Monday($selectedDate,$id_user);
    $list_Tuesday = $consultR->listRendez_vous_calendar_Tuesday($selectedDate,$id_user);
    $list_Wednesday = $consultR->listRendez_vous_calendar_Wednesday($selectedDate,$id_user);
    $list_Thursday = $consultR->listRendez_vous_calendar_Thursday($selectedDate,$id_user);
    $list_Friday = $consultR->listRendez_vous_calendar_Friday($selectedDate,$id_user);

}

    

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  
  <link rel="stylesheet" href="../source/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://fonts.gastatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                    <a href="../view/menu_consultation_patient.php"><img class="imglogo" src="../image/logo/logo.png" alt="logo"></a>
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
                

                <ul class="menu-links">

                    <li class="">
                        <a href="../view/rendez-vous.php">
                            <i class="bx bxs-calendar icon"></i>
                            <span class="text nav-text">Prendre RDV</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/rdvP.php">
                            <i class="bx bxs-cabinet icon"></i>
                            <span class="text nav-text">Consulter RDV</span>
                        </a>
                    </li>
                                 
                    <li class="">
                        <a href="selectionner_dossier.php">
                            <i class="bx bx-folder-open icon"></i>
                            <span class="text nav-text">Consulter Dossier</span>
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
        <form method="POST" action="">
          <div class="name-med" style="text-align: center;">
            <h1 style="font-size: 4em;  color: #333;  font-weight: bold; text-align: center;  margin-bottom: 20px; ">Calendar</h1>
            <br>
            <h4>Date debut :
            <input type="date" name="date" id="datePicker">
            <input type="submit" value="Afficher" style="padding: 10px 20px;  font-size: 16px;  font-weight: bold;  text-transform: uppercase;  background-color: #0077B6; color: #fff;   border: none;  border-radius: 5px; cursor: pointer;">
          </h4>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
          // Add event listeners for "Add RDV" buttons
          var addRdvButtons = document.querySelectorAll('.add-rdv');
          addRdvButtons.forEach(function (button) {
            button.addEventListener('click', function () {
              var day = button.getAttribute('data-day');
              var start = button.getAttribute('data-start');
              var end = button.getAttribute('data-end');

              console.log('Add RDV clicked for ' + day + ' from ' + start + ' to ' + end);
            });
          });
        });
      </script>
        </form>



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
            
            <input type="hidden" class="hiddenDateField" name="date_Monday" value="2023-11-20">
            <p id="date-num1" class="date-num">9</p>
            <p class="date-day">Mon</p>
        </div>
              <div class="events">
          <?php
          $nbr = 0;
          if (isset($list_Monday)) {
              foreach ($list_Monday as $rdv) {
                  $nbr++;
          ?>
                  <div class="event start-<?php echo $rdv['deb_rdv']; ?> end-<?php echo $rdv['fin_rdv']; ?> corp-fi">
                      <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>">
                          <p class="title"><?php echo $rdv['nom'] . '     ' . $rdv['prenom']; ?></p>
                          <p class="time"><?php echo $rdv['deb_rdv']; ?> PM - <?php echo $rdv['fin_rdv']; ?> PM</p>
                      </a>
                  </div>
          <?php
              }
          }

          for ($i = 9; $i <= 18 - $nbr; $i++) {
     
          ?>
              <input type="hidden" name="date_deb" value="<?php if ($i>12){echo $i-12;} else{echo $i;} ?>">
              <input type="hidden" name="date_fin" value ="<?php if ($i>12){echo ($i-12)+1;} else{echo $i+1;} ?>">
              <input type="hidden" value="<?php echo $id_user ?>">
              <div class="btn">
                  <a href="javascript:void(0);" class="open-modal" data-day="Monday" data-start="<?php echo $i; ?>" data-end="<?php echo ($i + 1); ?>"><button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Ajouter RDV</button></a>
              </div>
          <?php
          }
          ?>
      </div>

    </div>


          <script>
      document.addEventListener('DOMContentLoaded', function () {
 
        var addRdvButtons = document.querySelectorAll('.add-rdv');
        addRdvButtons.forEach(function (button) {
          button.addEventListener('click', function () {
            var day = button.getAttribute('data-day');
            var start = button.getAttribute('data-start');
            var end = button.getAttribute('data-end');

            console.log('Add RDV clicked for ' + day + ' from ' + start + ' to ' + end);
          });
        });
      });
    </script>

          <div class="day tues">
            <div class="date">
            <input type="hidden" class="hiddenDateField" name="date_Tuesday" value="">
              <p id="date-num2" class="date-num">10</p>
              <p class="date-day">Tues</p>
            </div>
              <div class="events">
                <?php
                $nbr=0;
                if (isset($list_Tuesday)) {
                  foreach ($list_Tuesday as $rdv) {
                    $nbr++;
                ?>
                
                <div class="event start-<?php echo $rdv['deb_rdv']; ?> end-<?php echo $rdv['fin_rdv']; ?> corp-fi">
                      <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>">
                          <p class="title"><?php echo $rdv['nom'] . '     ' . $rdv['prenom']; ?></p>
                          <p class="time"><?php echo $rdv['deb_rdv']; ?> PM - <?php echo $rdv['fin_rdv']; ?> PM</p>
                      </a>
                  </div>

                <?php
                
                  }
                  
                }
                // Always display the "Add RDV" button for each time slot
            for ($i = 9; $i <=18-$nbr; $i++) { // Assuming your time slots are from 9 AM to 6 PM
              ?>
                <input type="hidden" name="date_deb" value='<?php $i ?>'>
                <input type="hidden" name="date_fin" value ='<?php $i+1 ?>'>
        
                <div class="btn">
                  <a href="javascript:void(0);" class="open-modal" data-day="Monday" data-start="<?php echo $i; ?>" data-end="<?php echo ($i + 1); ?>"><button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Ajouter RDV</button></a>
                </div>
              <?php
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
              $nbr=0;
              if (isset($list_Wednesday)) {
                foreach ($list_Wednesday as $rdv) {
                  $nbr++
              ?>
                <input type="hidden" name="date_deb" value='<?php $i ?>'>
                <input type="hidden" name="date_fin" value ='<?php $i+1 ?>'>
                <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> writing">
                  <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                    <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                    <p class="time"><?php echo $rdv['deb_rdv'];?> AM - <?php echo $rdv['fin_rdv'];?> PM</p>
                  </a>
                </div>
              <?php
                }
              }
              // Always display the "Add RDV" button for each time slot
            for ($i = 9; $i <=18-$nbr; $i++) {   // Assuming your time slots are from 9 AM to 6 PM
              ?>
                <input type="hidden" name="date_deb" value='<?php $i ?>'>
                <input type="hidden" name="date_fin" value ='<?php $i+1 ?>'>
                <div class="btn">
                  <a href="javascript:void(0);" class="open-modal" data-day="Monday" data-start="<?php echo $i; ?>" data-end="<?php echo ($i + 1); ?>"><button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Ajouter RDV</button></a>
              </div>
              <?php
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
                $nbr=0;
                if (isset($list_Thursday)) {
                  foreach ($list_Thursday as $rdv) {
                    $nbr++;
                ?>
                  <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> securities">
                    <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                      <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                      <p class="time"><?php echo $rdv['deb_rdv'];?> AM - <?php echo $rdv['fin_rdv'];?> PM</p>
                    </a>
                  </div>
                <?php
                  }
                }
                // Always display the "Add RDV" button for each time slot
            for ($i = 9; $i <=18-$nbr; $i++) { // Assuming your time slots are from 9 AM to 6 PM
              ?>
                <input type="hidden" name="date_deb" value='<?php $i ?>'>
                <input type="hidden" name="datefin" value ='<?php $i+1 ?>'>
                <div class="btn">
                  <a href="javascript:void(0);" class="open-modal" data-day="Monday" data-start="<?php echo $i; ?>" data-end="<?php echo ($i + 1); ?>"><button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Ajouter RDV</button></a>
              </div>
              <?php
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
              $nbr=0;
              if (isset($list_Friday)) {
                foreach ($list_Friday as $rdv) {
                  $nbr++
              ?> 
                <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> ssecurities">
                  <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                    <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                    <p class="time"><?php echo $rdv['deb_rdv'];?> AM - <?php echo $rdv['fin_rdv'];?> PM</p>
                  </a>
                </div>
          
              <?php
                }
              }
              // Always display the "Add RDV" button for each time slot
            for ($i = 9; $i <=18-$nbr; $i++) { // Assuming your time slots are from 9 AM to 6 PM
              ?>
                <input type="hidden" name="date-deb" value='<?php $i ?>'>
                <input type="hidden" name="date-fin" value ='<?php $i+1 ?>'>
                <div class="btn">
                  <a href="javascript:void(0);" class="open-modal" data-day="Monday" data-start="<?php echo $i; ?>" data-end="<?php echo ($i + 1); ?>"><button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Ajouter RDV</button></a>
              </div>
              <?php
          }
          ?>
          </div>

        </div>
      </div>

      </div>
      <div id="myModal" class="modal"></div>

      <script>
document.addEventListener('DOMContentLoaded', function () {

  var addRdvButtons = document.querySelectorAll('.open-modal');
addRdvButtons.forEach(function (button) {
  button.addEventListener('click', function () {
    var day = button.getAttribute('data-day');
    var start = button.getAttribute('data-start');  // Fix: 'data-start' instead of 'date_deb'
    var end = button.getAttribute('data-end');      // Fix: 'data-end' instead of 'date_fin'

    loadAddrDVModal(day, start, end);
  });
});

// Ajoutez un écouteur d'événements pour le clic sur le document entier
document.addEventListener('click', function (event) {
  var modal = document.getElementById('myModal');
  
  if (event.target !== modal && !modal.contains(event.target)) {
    modal.style.display = 'none';
  }
});

});

function loadAddrDVModal(day, start, end) {
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
  if (xhr.readyState == 4 && xhr.status == 200) {
    document.getElementById('myModal').innerHTML = xhr.responseText;

    // Affichez le modal et ajoutez une classe pour le style
    document.getElementById('myModal').style.display = 'block';
    document.body.classList.add('modal-open');
  }
};

var url = '../view/addrdv.php?date_deb=' + start + '&date_fin=' + end + '&date=date&id_user=<?php echo $id_user; ?>';

xhr.open('GET', url, true);
xhr.send();
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

</body>
</html>