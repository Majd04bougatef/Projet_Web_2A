<?php
include '../Controller/EventC.php';
// Initialiser les variables
$nomParticipant = $emailParticipant = $nomEvenement = $dateEvenement = $lieuEvenement = $emailAdmin = $mdpAdmin = '';

// Vérifier si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier et assigner les valeurs pour le formulaire d'inscription participant
    $nomParticipant = $_POST['nom_participant'] ?? '';
    $emailParticipant = $_POST['email_participant'] ?? '';

    // Vous pouvez effectuer des opérations supplémentaires ou enregistrer les données dans la base de données
    require_once 'config.php';
    // Rediriger vers une page ou afficher un message de succès
    // header('Location: inscription.php'); // Assurez-vous de rediriger vers la bonne page
    // exit();
}

// Vérifier et assigner les valeurs pour le formulaire de création d'événement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomEvenement = $_POST['nom_evenement'] ?? '';
    $dateEvenement = $_POST['date_evenement'] ?? '';
    $lieuEvenement = $_POST['lieu_evenement'] ?? '';
    $emailAdmin = $_POST['email_admin'] ?? '';
    $mdpAdmin = $_POST['mdp_admin'] ?? '';

    // Vous pouvez effectuer des opérations supplémentaires ou enregistrer les données dans la base de données

    // Rediriger vers une page ou afficher un message de succès
    // header('Location: creation_evenement.php'); // Assurez-vous de rediriger vers la bonne page
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription à l'événement</title>
    <style>
        /* Ajoutez votre CSS ici */
    </style>
</head>

<body>
    <div class="home">
        <h1>Inscription à l'événement</h1>

        <!-- Formulaire pour les participants -->
        <section>
            <h2>Formulaire d'inscription</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="nom_participant">Nom : </label>
                <input type="text" id="nom_participant" name="nom_participant" value="<?php echo htmlspecialchars($nomParticipant); ?>" required><br>

                <label for="email_participant">Email : </label>
                <input type="email" id="email_participant" name="email_participant" value="<?php echo htmlspecialchars($emailParticipant); ?>" required><br>

                <input type="submit" value="S'inscrire">
            </form>
        </section>

        <!-- Formulaire pour les administrateurs -->
        <section>
            <h2>Création d'événement</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="nom_evenement">Nom de l'événement : </label>
                <input type="text" id="nom_evenement" name="nom_evenement" value="<?php echo htmlspecialchars($nomEvenement); ?>" required><br>

                <label for="date_evenement">Date de l'événement : </label>
                <input type="date" id="date_evenement" name="date_evenement" value="<?php echo htmlspecialchars($dateEvenement); ?>" required><br>

                <label for="lieu_evenement">Lieu de l'événement : </label>
                <input type="text" id="lieu_evenement" name="lieu_evenement" value="<?php echo htmlspecialchars($lieuEvenement); ?>" required><br>

                <label for="email_admin">Email administrateur : </label>
                <input type="email" id="email_admin" name="email_admin" value="<?php echo htmlspecialchars($emailAdmin); ?>" required><br>

                <label for="mdp_admin">Mot de passe administrateur : </label>
                <input type="password" id="mdp_admin" name="mdp_admin" value="<?php echo htmlspecialchars($mdpAdmin); ?>" required><br>

                <input type="submit" value="Créer l'événement">
            </form>
        </section>
    </div>
</body>

</html>
