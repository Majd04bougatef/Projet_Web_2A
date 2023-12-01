
<?php
    include_once("../controller/add.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Événement</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            width: 60%;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            margin: 0;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        section {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input[type="text"],
        form input[type="date"],
        form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Formulaire d'Événement</h1>
    </header>

    <main>
        <section>
            <form action="traitement_formulaire.php" method="POST">
                <label for="titre">Titre de l'événement:</label>
                <input type="text" id="titre" name="titre" required>

                <label for="dateDebut">Date de début:</label>
                <input type="date" id="dateDebut" name="dateDebut" required>

                <label for="dateFin">Date de fin:</label>
                <input type="date" id="dateFin" name="dateFin" required>

                <label for="lieu">Lieu:</label>
                <input type="text" id="lieu" name="lieu" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <input type="submit" value="Enregistrer">
            </form>
        </section>
    </main>
</body>
</html>
