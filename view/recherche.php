<?php


// Connect to the database
require_once '../config.php'; // You need to create this file with your database connection details

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Prepare a PDO statement for the search
    $stmt = $pdo->prepare("SELECT * FROM user WHERE name LIKE :search");
    $stmt->bindValue(':search', "%$searchTerm%", PDO::PARAM_STR);
    $stmt->execute();

    // Fetch and display the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        foreach ($results as $result) {
            echo "ID:nom: {$result['nom']}, Email: {$result['email']}<br>";
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "Invalid search request.";
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="search_results.php" method="GET">
    <label for="search">Search by Name:</label>
    <input type="text" name="search" id="search" required>
    <button type="submit">Search</button>
</form>
</body>
</html>




