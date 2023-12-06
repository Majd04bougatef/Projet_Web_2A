
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
</head>
<body>

<?php
include '../controller/userC.php';

// Exemple d'utilisation
$nomRecherche = "NomRecherche";
$resultats = userC::rechercheParNom($nomRecherche);

// Affichage des résultats
foreach ($resultats as $row) {
    echo "ID utilisateur: " . $row['id_user'] . "<br>";
    echo "Nom: " . $row['nom'] . "<br>";
    // ... afficher d'autres champs selon vos besoins
    echo "<hr>";
}
?>

</body>
</html>

