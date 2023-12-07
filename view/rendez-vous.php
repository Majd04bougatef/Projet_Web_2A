<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="../source/menu_consultation.css">
    <title>Document</title> 
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('../source/bgr.jpg'); 
            background-size: cover;
            background-position: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 1050px;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            position: relative;
        }

        /* ... Votre style existant ... */
    </style>  
</head>



<body>
<form class="form" action="../View/rdv2.php" method="POST" id="registrationForm">
    <p class="title">Find a doctor </p>
    <p class="message">CHOSE THE PLACE TO DISPLAY DOCTORS</p>
    
    <label for="pays">Sélectionnez un pays :</label>
    <select name="pays" id="pays" onchange="chargerVilles()">
        <option value="0">select </option>
        <option value="tunisie">Tunisie</option>
        <option value="france">France</option>
        <!-- Ajoutez d'autres pays au besoin -->
    </select>

    <br>

    <label for="ville">Sélectionnez une ville :</label>
    <select id="ville" onchange="chargerGouvernements()" name="ville">
        <!-- Les options seront chargées dynamiquement en JavaScript -->
    </select>


    <label for="specialites-medicales">Sélectionnez une  specialites-medicales :</label>
    <select id="specialites-medicales" class="select-box" name="select-box">
                       <option value="cardiologie">Cardiologie</option>
                       <option value="dermatologie">Dermatologie</option>
                       <option value="gastro-entérologie">Gastro-entérologie</option>
                       <option value="gynécologie-obstétrique">Gynécologie-obstétrique</option>
                       <option value="néphrologie">Néphrologie</option>
                       <option value="neurologie">Neurologie</option>
                       <option value="ophtalmologie">Ophtalmologie</option>
                       <option value="orthopédie">Orthopédie</option>
                       <option value="pédiatrie">Pédiatrie</option>
                       <option value="psychiatrie">Psychiatrie</option>
                       <option value="radiologie">Radiologie</option>
                   </select>

            
                   <button type="submit" class="submit" onclick="submitForm();">Submit</button>
</form>
        <script>

function chargerVilles() {
    var paysSelect = document.getElementById("pays");
    var villeSelect = document.getElementById("ville");

    // Efface les options actuelles
    villeSelect.innerHTML = "";

    // Ajoute les nouvelles options en fonction du pays sélectionné
    if (paysSelect.value === "tunisie") {
        ajouterOption(villeSelect, "tunis", "Tunis");
        ajouterOption(villeSelect, "sfax", "Sfax");
        ajouterOption(villeSelect, "sousse", "Sousse");
        // Ajoutez d'autres villes tunisiennes au besoin
    } else if (paysSelect.value === "france") {
        ajouterOption(villeSelect, "paris", "Paris");
        ajouterOption(villeSelect, "marseille", "Marseille");
        ajouterOption(villeSelect, "lyon", "Lyon");
        // Ajoutez d'autres villes françaises au besoin
    }
    
    // Met à jour les gouvernements en fonction de la nouvelle sélection de la ville
}



function ajouterOption(selectElement, value, text) {
    var option = document.createElement("option");
    option.value = value;
    option.text = text;
    selectElement.add(option);
}

// Charge initialement les villes au chargement de la page
chargerVilles();

function submitForm() {
            // Get selected values
            const pays = document.getElementById("pays").value;
            const ville = document.getElementById("ville").value;
            const specialite = document.getElementById("specialites-medicales").value;

            // Redirect to result.html with query parameters
            window.location.href = `rdv2.php?pays=${pays}&ville=${ville}&specialite=${specialite}`;
        }

        </script>
</body>

</html>