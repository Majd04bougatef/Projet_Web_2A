
<?php
include '../Controller/EventC.php';
// Définir des variables ou effectuer d'autres opérations PHP si nécessaire
$nomEvenement = "Octobre rose";
$dateEvenement = "18 octobre 2023";
$lieuEvenement = "Ariena";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description de l'événement</title>
    <style>
        /* Styles CSS ici */
    </style>
</head>

<body>

    <header>
        <h1>Nom de l'événement: <?php echo $nomEvenement; ?></h1>
        <p>Date de l'événement: <?php echo $dateEvenement; ?></p>
        <p>Lieu: <?php echo $lieuEvenement; ?> </p>
    </header>

    <section>
        <h2>Description de l'événement</h2>
        <p>
            Rejoignez-nous pour une initiative inspirante en faveur d'Octobre Rose, mois dédié à la sensibilisation au
            cancer du sein.
            Notre événement éducatif rassemble la communauté pour partager des informations cruciales, encourager
            l'autopalpation et célébrer la résilience des survivants.
            Ensemble, faisons entendre la voix de l'espoir dans la lutte contre le cancer du sein.
        </p>
    </section>

    <section>
        <h2>Photos de l'événement</h2>
        <figure>
            <img src="photo1.png" alt="Photo de l'événement">
        </figure>
    </section>

    <section>
        <h2>Inscription à l'événement</h2>
        <p>Si vous souhaitez participer à cet événement, veuillez remplir le formulaire ci-dessous :</p>
        <button onclick="redirigerVersInscription()">S'inscrire</button>
    </section>
    <button onclick="redirigerVersInscription()">S'inscrire</button>

<script>
    function redirigerVersInscription() {
        console.log('Fonction appelée');
        window.location.href = '/CRUD/view/back_office/add.php';
    }
</script>


</body>

</html>
