

<?php

    include '../controller/rdvC.php';

    $rdv= new rdvC();

    $r = $rdv->listrdv($_POST['pays'],$_POST['ville'],$_POST['select-box']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../source/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <script src="../source/menu.js"></script>
    <title>Document</title>
    <style>


        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 1050px;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            position: relative;
        }
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

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Adjust the gap as needed */
        }

        .card {
            width: 200px; /* Adjust the card width as needed */
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            margin: 10px;
        }
    </style>  
</head>
<body>
    <div>
    <?php
        foreach ($r as $med){
    ?>
    <div class="card">
            <div class="card-border-top">
        </div>
        <div class="img">
            </div>
            <span> <?php echo $med['nom']?></span>
            <p class="job">  <?php echo $med['prenom']?></p>
            <input type="hidden" name="id_user"  <?php echo $med['id_user']?>>
            
            <a href="../view/calendar.php?id_user=<?php echo $med['id_user']?>"> <button> Click </button></a>
    </div>
            
    <?php
        }
    ?>
    </div>

    <script>
        
        // Get query parameters from the URL
        const urlParams = new URLSearchParams(window.location.search);

        // Display selected values
        pays=document.getElementById("selectedPays").innerText = urlParams.get("pays");
        ville=document.getElementById("selectedVille").innerText = urlParams.get("ville");
        specialite=document.getElementById("selectedSpecialiteMedicale").innerText = urlParams.get("specialite");
       
        </script>

</body>
</html>