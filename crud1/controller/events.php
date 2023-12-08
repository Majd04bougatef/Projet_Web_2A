<?php
require_once '../config.php';
include_once '../Controller/ParticipantC.php';
// Initialiser les variables
$nomParticipant = $emailParticipant = $nomEvenement = $dateEvenement = $lieuEvenement = $emailAdmin = $mdpAdmin = '';

// Vérifier si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier et assigner les valeurs pour le formulaire d'inscription participant
    $nomParticipant = $_POST['nom_participant'] ?? '';
    $emailParticipant = $_POST['email_participant'] ?? '';

    // Vous pouvez effectuer des opérations supplémentaires ou enregistrer les données dans la base de données
   
    // Rediriger vers une page ou afficher un message de succès
    // header('Location: inscription.php'); // Assurez-vous de rediriger vers la bonne page
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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Inscription à l'événement</h1>

        <section>
            <h2>Formulaire d'inscription</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="nom_participant">Nom :</label>
                <input type="text" id="nom_participant" name="nom_participant" value="<?php echo htmlspecialchars($nomParticipant); ?>" required>

                <label for="email_participant">Email :</label>
                <input type="email" id="email_participant" name="email_participant" value="<?php echo htmlspecialchars($emailParticipant); ?>" required>

                <input type="submit" value="S'inscrire">
            </form>
        </section>
    </div>
</body>

</html>
