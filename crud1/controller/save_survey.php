<?php
include_once '../config.php';

// Connexion à la base de données (à adapter selon votre configuration)
$servername = "localhost";
$dbname = "medtun";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO à exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $satisfaction = $_POST['satisfaction'];
    $commentaire = $_POST['commentaire'];

    // Préparer et exécuter la requête SQL pour insérer les données dans la base de données
    $stmt = $conn->prepare("INSERT INTO reponses_sondage (satisfaction, commentaire) VALUES (:satisfaction, :commentaire)");
    $stmt->bindParam(':satisfaction', $satisfaction);
    $stmt->bindParam(':commentaire', $commentaire);
    $stmt->execute();

    echo "Réponse enregistrée avec succès !";
} catch (PDOException $e) {
    echo "Erreur lors de l'enregistrement de la réponse : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
?>
