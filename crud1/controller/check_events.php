<?php
include_once '../config.php';

try {
    // Connexion à la base de données
    $pdo = config::getConnexion();

    // Requête SQL SELECT pour récupérer tous les événements
    $query = $pdo->query('SELECT * FROM evenement');
    $events = $query->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les événements
    echo '<pre>';
    print_r($events);
    echo '</pre>';
} catch (PDOException $e) {
    // Gérer les erreurs de base de données
    die('Erreur de base de données : ' . $e->getMessage());
}
?>
