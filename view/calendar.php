
<?php
include_once '../controller/consultationR.php';
$consultR = new consultationfunction();
$id_user = $_GET["id_user"] ?? "";


if(isset($_POST['date'])){
  echo 'sdvsdvsdvsd';
 
    $selectedDate = $_POST['date'];
    $list_Monday = $consultR->listRendez_vous_calendar_Monday($selectedDate);
    $list_Tuesday = $consultR->listRendez_vous_calendar_Tuesday($selectedDate);
    $list_Wednesday = $consultR->listRendez_vous_calendar_Wednesday($selectedDate);
    $list_Thursday = $consultR->listRendez_vous_calendar_Thursday($selectedDate);
    $list_Friday = $consultR->listRendez_vous_calendar_Friday($selectedDate);

}

    

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="../source/style.css">
  <style>
    .event.add-rdv {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    background-color: white; /* Blue color */
    color: #black; /* White text color */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s; /* Smooth transition on hover */
}

/* Hover effect for the button */
.event.add-rdv:hover {
    background-color: #00506b; /* Darker blue color on hover */
}
  </style>
</head>
<body>
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

          // Always display the "Add RDV" button for each time slot
          for ($i = 9; $i <= 18 - $nbr; $i++) {
              // Assuming your time slots are from 9 AM to 6 PM
          ?>
              <input type="hidden" name="date_deb" value='<?php echo $i; ?>'>
              <input type="hidden" name="date_fin" value ='<?php echo $i + 1; ?>'>
              <input type="hidden" value=<?php $id_user ?>>
              <div class="btn">
                  <a href="../view/addrdv.php?date_deb=<?php echo $i; ?>&date_fin=<?php echo $i + 1; ?>&date=<?php echo '$date'; ?>&id_user=<?php echo $id_user; ?>">
                      <button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Add RDV</button>
                  </a>
              </div>
          <?php
          }
          ?>
      </div>

    </div>


          <script>
      document.addEventListener('DOMContentLoaded', function () {
        // ... (your existing JavaScript code)

        // Add event listener for "Add RDV" buttons
        var addRdvButtons = document.querySelectorAll('.add-rdv');
        addRdvButtons.forEach(function (button) {
          button.addEventListener('click', function () {
            var day = button.getAttribute('data-day');
            var start = button.getAttribute('data-start');
            var end = button.getAttribute('data-end');

            // Implement your logic to handle the "Add RDV" button click
            // You might want to open a form or perform some other action
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
                <a href="../view/addrdv.php?date_deb=<?php echo $i; ?>&date_fin=<?php echo $i + 1; ?>&date=<?php echo 'date'; ?>&id_user=<?php echo $id_user ;?>">
                      <button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Add RDV</button>
                  </a>
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
                   <a href="../view/addrdv.php?date_deb=<?php echo $i; ?>&date_fin=<?php echo $i + 1; ?>&date=<?php echo 'date'; ?>&id_user=<?php echo $id_user ?>">
                      <button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Add RDV</button>
                  </a>
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
                <a href="../view/addrdv.php?date_deb=<?php echo $i; ?>&date_fin=<?php echo $i + 1; ?>&date=<?php echo 'date'; ?>&id_user=<?php echo $id_user ?>">
                      <button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Add RDV</button>
                  </a>
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
                <a href="../view/addrdv.php?date_deb=<?php echo $i; ?>&date_fin=<?php echo $i + 1; ?>&date=<?php echo 'date'; ?>&id_user=<?php echo $id_user ?>">
                      <button class="event add-rdv" data-day="Monday" data-start="<?php echo $i; ?> AM" data-end="<?php echo ($i + 1); ?> PM">Add RDV</button>
                  </a>
              </div>
              <?php
          }
          ?>
          </div>

        </div>
      </div>


  <script src="../source/calendar.js"> </script>

</body>
</html>
