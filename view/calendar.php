
<?php
    include_once '../controller/consultationR.php';
    $consultR = new consultationfunction();
    $list_Monday = $consultR->listRendez_vous_calendar_Monday();
    $list_Tuesday = $consultR->listRendez_vous_calendar_Tuesday();
    $list_Wednesday = $consultR->listRendez_vous_calendar_Wednesday();
    $list_Thursday = $consultR->listRendez_vous_calendar_Thursday();
    $list_Friday = $consultR->listRendez_vous_calendar_Friday();


?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="../assets/calendar/style.css">

</head>
<body>
  <div class="title">
    <div class="name-med">
      <h1>Calendar</h1>
      <br>
      Date debut : 
      <input type="date" name="date">
    </div>
  </div>

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
            foreach ($list_Monday as $rdv) {
            
          ?>
          
            <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> corp-fi">
              <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                <p class="time"><?php echo $rdv['deb_rdv'];?> PM - <?php echo $rdv['fin_rdv'];?> PM</p>
              </a>  
            </div>
          
          <?php
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
              foreach ($list_Tuesday as $rdv) {
            ?>
            
            <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> ent-law">
              <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                <p class="time"><?php echo $rdv['deb_rdv'];?> AM - <?php echo $rdv['fin_rdv'];?> PM</p>
              </a>
            </div>

            <?php
              }
            ?>
        </div>  
      </div>


      <div class="day wed">
        <div class="date">
          <p id="date-num3" class="date-num">11</p>
          <p class="date-day">Wed</p>
        </div>
        <div class="events">
          <?php
            foreach ($list_Wednesday as $rdv) {
          ?>
            <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> writing">
              <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                <p class="time"><?php echo $rdv['deb_rdv'];?> AM - <?php echo $rdv['fin_rdv'];?> PM</p>
              </a>
            </div>
          <?php
            }
          ?>   
        </div>
      </div>


      <div class="day thurs">
        <div class="date">
          <p id="date-num4" class="date-num">12</p>
          <p class="date-day">Thurs</p>
        </div>
          <div class="events">
            <?php
              foreach ($list_Thursday as $rdv) {
            ?>
              <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> securities">
                <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                  <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                  <p class="time"><?php echo $rdv['deb_rdv'];?> AM - <?php echo $rdv['fin_rdv'];?> PM</p>
                </a>
              </div>
            <?php
              }
            ?>
          </div>
      </div>


      <div class="day fri">
        <div class="date">
          <p id="date-num5" class="date-num">13</p>
          <p class="date-day">Fri</p>
        </div>
        <div class="events">
          <?php
            foreach ($list_Friday as $rdv) {
          ?> 
            <div class="event start-<?php echo $rdv['deb_rdv'];?> end-<?php echo $rdv['fin_rdv'];?> ssecurities">
              <a href="../view/formulaire_rendez-vouz.php?id_rdv=<?php echo urlencode($rdv['id_rdv']); ?>&nom=<?php echo urlencode($rdv['nom']); ?>&prenom=<?php echo urlencode($rdv['prenom']); ?>&age=<?php echo urlencode($rdv['age']); ?>" >
                <p class="title"><?php echo $rdv['nom'].'     '.$rdv['prenom'];?></p>
                <p class="time"><?php echo $rdv['deb_rdv'];?> AM - <?php echo $rdv['fin_rdv'];?> PM</p>
              </a>
            </div>
       
          <?php
            }
          ?>
      </div>

    </div>
  </div>

  <script>
      function updateCurrentWeek() {
        var days = document.querySelectorAll('.date-num');
        var today = new Date();
        var currentDayOfWeek = today.getDay(); 
        var monday = today.getDate() - currentDayOfWeek + 1;

        days.forEach(function(day, index) {
          var dayValue = monday + index;
          day.textContent = dayValue;

          if (dayValue < 1) {
            var lastDayOfPreviousMonth = new Date(today.getFullYear(), today.getMonth(), 0).getDate();
            day.textContent = lastDayOfPreviousMonth + dayValue;
          } else if (dayValue > new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate()) {
            day.textContent = dayValue - new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate();
          }
        });
      }

      updateCurrentWeek();



    /* function getNextWeekday(currentDate, targetDay) {
          const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

          const currentDay = currentDate.getDay();
          const daysUntilTarget = (targetDay - currentDay + 7) % 7;

          const nextWeekday = new Date(currentDate);
          nextWeekday.setDate(currentDate.getDate() + daysUntilTarget);

          return nextWeekday;
      }

      const today = new Date();
      const nextMonday = getNextWeekday(today, 1);

      document.getElementById("date-num1").innerHTML = nextMonday.getDate();*/
    </script>

</body>
</html>
