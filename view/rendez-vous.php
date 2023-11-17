
<?php
    include_once '../controller/consultationR.php';
    $consultR = new consultationfunction();
    $list = $consultR->listRendez_vous();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/rendez-vous/rendez-vous.css">
    <title>Rendez-vous</title>
</head>
<body>
    <br><br><br><br>
    
    <h2 class="title">Les Rendez-vous Disponible pour Aujourd'hui : </h2>
    <br><br>

    
    
    
    <section class="rendre-vous">


    
    <?php
        foreach ($list as $rdv) {
    ?>
        <div class="card">
            <div class="card-border-top"></div>
            <div class="img"></div>
            <span><?php echo $rdv['nom']; ?></span>
            <p class="job"><?php echo $rdv['prenom']; ?></p>
            <form method="POST" action="../view/formulaire_rendez-vouz.php">
                <button type="submit">Enregistrer Consultation</button>
                <input type="hidden" value=<?php  echo $rdv['id_rdv'];?> name="idrdv">
            </form>
        </div>    
    <?php
        }
    ?>


        
    
                   
    </section>

    <script src="../assets/rendez-vous/rendez-vous.js"></script>
</body>
</html>