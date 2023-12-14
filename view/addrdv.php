<?php
include_once '../controller/rdvC.php';
include_once '../controller/catC.php';
$date = $dateDeb = $dateFin = "";

session_start();

$date = $_GET["date"] ?? "";
$dateDeb = $_GET["date_deb"] ?? "";
$dateFin = $_GET["date_fin"] ?? "";
$id_user = $_GET["id_user"] ?? "";
$infop = new rdvC();
$result = $infop->show_info_patient($_SESSION['user_id']);
$info = $result->fetch(PDO::FETCH_ASSOC);



?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="../source/box/style.css">
      <title>Document</title>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.querySelector('input[name="date"]');
            const currentDate = new Date().toISOString().split('T')[0];

            dateInput.addEventListener('input', function () {
                const selectedDate = dateInput.value;

                if (selectedDate < currentDate) {
                    alert('Please select a date in the future.');
                    dateInput.value = ''; // Clear the input field
                }
            });
        });
    </script>
      
  </head>
  <body>
  <form method="POST" class="form" action="../view/addr.php">
      <p class="title">Register </p>
      <p class="message">enter more information </p>

     
          <label>
              <input required="" placeholder="" type="text" name="nom" class="input" value="<?php echo $info['nom'];?>">
              <span>Firstname</span>
          </label>

          <label>
              <input required="" placeholder="" type="text" name="prenom" class="input" value="<?php echo $info['prenom'];?>">
              <span>Lastname</span>
          </label>
      
              
      <label>
          <input required="" placeholder="" type="email" name="mail" class="input" value="<?php echo $info['mail'];?>">
          <span>Email</span>
      </label> 

      <label>
          <input required="" placeholder="" type="text" name="id_user" class="input" value="<?php echo $id_user;?>">
          <span>id doctor</span>
      </label> 
          
      <label >type rendez-vous
        <div class="selectdiv">
          <select name="catrdv" >
            <option value="">selectionner type ></option>
            <?php
              $catController = new catC();
              $categories = $catController->listcat();
              var_dump($categories);

              foreach ($categories as $category) {
                  echo '<option value="' . $category['id_categorie'] . '">' . $category['categorie'] . '</option>';
              }
              ?>
          </select>
        </div>
      </label> 

      <label for="date">
        date
      <input required="" placeholder="" type="date" name="date" class="input" value="<?php echo $date;?>">
      </label>
      <label for="date-deb">
        date-debut
      <input required="" placeholder="" type="text" name="dateDeb" class="input" value="<?php echo $dateDeb;?>" >
      </label>
      <label for="date-fin">
        date-fin
      <input required="" placeholder="" type="text" class="input" name="dateFin"  value="<?php echo $dateFin;?>">
      </label>

      <button class="submit" type="submit">Submit</button>
  </form>
  </body>
  </html>