<?php

include '../controller/rdvC.php';

$error = "";

// create rendezvous
$rd = null;

// create an instance of the controller
$rdvC = new rdvC();

if (
    isset($_POST["id_rdv"]) &&
    isset($_POST["date_rdv"]) &&
    isset($_POST["id_categorie"]) &&
    isset($_POST["id_user"])
) {
    if (
        !empty($_POST['id_rdv']) &&
        !empty($_POST["date_rdv"]) &&
        !empty($_POST["id_categorie"]) &&
        !empty($_POST["id_user"])
    ) {
        $rd = new rendezvous(
            null,
            $_POST['date_rdv'],
            $_POST['id_categorie'],
            $_POST['id_user']
        );
        $rdvC->addrdv($rd);
        header('Location: listerdv.php');
        exit(); // Ajout pour terminer l'exécution après la redirection
    } else {
        $error = "Missing information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rendezvous</title>
</head>
<body>
    <form action="ajjout.php" method="POST">
        <table>
            <tr>
                <th>id rendezvous</th>
                <th>date rendezvous</th>
                <th>id categorie</th>
                <th>id user</th>
            </tr>
            <tr>
                <td><input type="number" name="id_rdv"></td>
                <td><input type="date" name="date_rdv"></td>
                <td><input type="number" name="id_categorie"></td>
                <td><input type="number" name="id_user"></td>
            </tr>
        </table>
        <input type="submit" value="ajouter">
    </form>
</body>
</html>
