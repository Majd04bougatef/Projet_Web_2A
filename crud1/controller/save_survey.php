<?php
include_once '../config.php';

$servername = "localhost";
$dbname = "medtun";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $satisfaction = $_POST['satisfaction'];
    $commentaire = $_POST['commentaire'];

    $stmt = $conn->prepare("INSERT INTO reponses_sondage (satisfaction, commentaire) VALUES (:satisfaction, :commentaire)");
    $stmt->bindParam(':satisfaction', $satisfaction);
    $stmt->bindParam(':commentaire', $commentaire);
    $stmt->execute();

    echo "Réponse enregistrée avec succès !";
} catch (PDOException $e) {
    echo "Erreur lors de l'enregistrement de la réponse : " . $e->getMessage();
}

$conn = null;
?>
