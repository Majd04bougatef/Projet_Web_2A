<?php
require_once '../config.php';
include_once '../Controller/ParticipantC.php';

$error = "";
$success = "";

$participantC = new ParticipantC();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomParticipant = htmlspecialchars($_POST['nom_participant'] ?? '');
    $emailParticipant = htmlspecialchars($_POST['email_participant'] ?? '');

    if (empty($nomParticipant) || empty($emailParticipant) || !filter_var($emailParticipant, FILTER_VALIDATE_EMAIL)) {
        $error = "Veuillez remplir tous les champs correctement.";
    } else {
        $result = $participantC->addParticipant($nomParticipant, $emailParticipant);

        if ($result === true) {
            $confirmationMessage = "Merci de vous être inscrit à l'événement. Veuillez confirmer votre participation.";
            mail($emailParticipant, "Confirmation d'inscription", $confirmationMessage);

            $success = "Inscription réussie. Un email de confirmation a été envoyé.";
        } else {
            $error = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription au participant</title>
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
    <h1>Inscription au participant</h1>

    <?php if ($error): ?>
        <div class="error">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success">
            <?= $success; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <label for="nom_participant">Nom :</label>
        <input type="text" id="nom_participant" name="nom_participant" required>

        <label for="email_participant">Email :</label>
        <input type="email" id="email_participant" name="email_participant" required>

        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>
