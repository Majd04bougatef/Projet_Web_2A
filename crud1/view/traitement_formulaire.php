<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $titre = htmlspecialchars($_POST["titre"]);
    $dateDebut = htmlspecialchars($_POST["dateDebut"]);
    $dateFin = htmlspecialchars($_POST["dateFin"]);
    $lieu = htmlspecialchars($_POST["lieu"]);
    $description = htmlspecialchars($_POST["description"]);

    // Vous pouvez ajouter des validations supplémentaires ici

    // Enregistrez les données dans votre base de données ou effectuez toute autre action nécessaire
    // Par exemple, si vous avez une classe EventC avec une méthode addEvent, vous pouvez l'appeler ici

    // Exemple:
    // include 'EventC.php';
    // $eventC = new EventC();
    // $eventC->addEvent($titre, $dateDebut, $dateFin, $lieu, $description);

    // Redirigez l'utilisateur vers une page de confirmation ou autre
    header('Location: confirmation.php');
    exit();
} else {
    // Si le formulaire n'a pas été soumis, redirigez l'utilisateur vers la page du formulaire
    header('Location: formulaire.php');
    exit();
}
?>
