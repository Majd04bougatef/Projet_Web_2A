<?php
include_once '../controller/rdvC.php';
$date = $dateDeb = $dateFin = "";

$date = $_GET["date"] ?? "";
$dateDeb = $_GET["date_deb"] ?? "";
$dateFin = $_GET["date_fin"] ?? "";
$id_user = $_GET["id_user"] ?? "";
$infop = new rdvC();
$result = $infop->show_info_patient('PA12345678');
$info = $result->fetch(PDO::FETCH_ASSOC);

$eror="";


$rdvc=new rdvC();
if(   isset($date)|| isset($dateDeb)||  isset($dateFin)|| isset($_GET["catrdv"])|| isset($id_user) ){
    $r= new rendezvous(NULL,$date,isset($_GET['idcat']),'PA12345678',$dateDeb,$dateFin);

   
    $rdvc->addrdv($r);
  }
  else{
    echo "eror";
  }



// Le reste de votre code pour traiter les données
?> 


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>

body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('../source/bgr.jpg'); 
            background-size: cover;
            background-position: center;
        }

          .form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 350px;
    background-color: #fff;
    padding: 20px;
    border-radius: 20px;
    position: relative;
  }

  .title {
    font-size: 28px;
    color: royalblue;
    font-weight: 600;
    letter-spacing: -1px;
    position: relative;
    display: flex;
    align-items: center;
    padding-left: 30px;
  }

  .title::before,.title::after {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 0px;
    background-color: royalblue;
  }

  .title::before {
    width: 18px;
    height: 18px;
    background-color: royalblue;
  }

  .title::after {
    width: 18px;
    height: 18px;
    animation: pulse 1s linear infinite;
  }

  .message, .signin {
    color: rgba(88, 87, 87, 0.822);
    font-size: 14px;
  }

  .signin {
    text-align: center;
  }

  .signin a {
    color: royalblue;
  }

  .signin a:hover {
    text-decoration: underline royalblue;
  }

  .flex {
    display: flex;
    width: 100%;
    gap: 6px;
  }

  .form label {
    position: relative;
  }

  .form label .input {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 10px;
  }

  .form label .input + span {
    position: absolute;
    left: 10px;
    top: 15px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
  }

  .form label .input:placeholder-shown + span {
    top: 15px;
    font-size: 0.9em;
  }

  .form label .input:focus + span,.form label .input:valid + span {
    top: 30px;
    font-size: 0.7em;
    font-weight: 600;
  }

  .form label .input:valid + span {
    color: green;
  }

  .submit {
    border: none;
    outline: none;
    background-color: royalblue;
    padding: 10px;
    border-radius: 10px;
    color: #fff;
    font-size: 16px;
    transform: .3s ease;
  }

  .submit:hover {
    background-color: rgb(56, 90, 194);
  }

  @keyframes pulse {
    from {
      transform: scale(0.9);
      opacity: 1;
    }
    to {
      transform: scale(1.8);
      opacity: 0;
    }
  }
      </style>
  </head>
  <body>
  <form class="form">
      <p class="title">Register </p>
      <p class="message">enter more information </p>

          <div class="flex">
          <label>
              <input required="" placeholder="" type="text" name="nom" class="input" value="<?php echo $info['nom'];?>">
              <span>Firstname</span>
          </label>

          <label>
              <input required="" placeholder="" type="text" name="prenom" class="input" value="<?php echo $info['prenom'];?>">
              <span>Lastname</span>
          </label>
      </div>  
              
      <label>
          <input required="" placeholder="" type="email" name="mail" class="input" value="<?php echo $info['mail'];?>">
          <span>Email</span>
      </label> 

      <label>
          <input required="" placeholder="" type="text" name="id_user" class="input" value="<?php echo $id_user;?>">
          <span>id doctor</span>
      </label> 
          
      <label>type rendez-vous
          <select name="catrdv">
              <option value="1">consultation_generale</option>
              <option value="2">suivie maladie chronique</option>
              <option value="3">examen spécifique</option>
              <option value="4">consultation spécialisée</option>
              <option value="5">Chirurgie</option>
          </select>
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

      <button class="submit">Submit</button>
  </form>
  </body>
  </html>