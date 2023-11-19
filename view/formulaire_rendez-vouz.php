
<?php
    include_once("../controller/addconsultation.php");
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https:://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/formulaire_rendez-vous/formulaire_rendez-vous.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
</head>
<body>


    
    <?php
        if (isset($_GET['id_rdv'])) {
            $id_rdv = $_GET['id_rdv'];
            $nom = isset($_GET['nom']) ? $_GET['nom'] : '';
            $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : '';
            $age = isset($_GET['age']) ? $_GET['age'] : '';


        } 
    ?>
    <form class="form" method="POST" action="../controller/addconsultation.php">
        <p class="title">Register Consultation</p>
        <p class="message">Information Patient</p>
            <div class="flex">
                <label for="nom">
                    <span>Nom : </span>
                    <input  type="hidden" name="idrdv" value="<?php echo $id_rdv; ?>">
                    <input class="input" id="nom"  type="text" name="nom" value="<?php echo $nom; ?>">
                    
                </label>
        
                <label for="prenom">
                    <span>Prénom : </span>
                    <input class="input" type="text" id="prenom"  name="prenom" value="<?php echo $prenom; ?>">
                    
                </label>
            </div>  
                
            <div class="flex">
                <label for="age">
                    <span>Age :</span>
                    <input class="input" type="text" id="age" name="age" value="<?php echo $age; ?>">
                    
                </label> 
                    
               
            </div>
        </p>

        <p class="message">Information Consultation</p>
            <div class="flex">
                <label for="date">
                    <span>Date Consultation</span>
                    <input class="input" type="date" id="date"  name="date" >
                </label>
                
                <label for="description">
                    <span>Description Consultation</span>
                    <textarea class="input" id="description"  type="text" name="description" ></textarea>
                </label>

                
   
            </div>  
                
            <div class="flex">
                <label for="motif">
                    <span>Motif Consultation</span>
                    <input class="input" id="motif"  type="text" name="motif" >
                </label> 
                  
                <label for="symptomes">
                    <span>Symptomes</span>
                    <input class="input" id="symptomes"  type="text" name="symptomes" >
                </label> 
            </div>

            <div class="flex">
                <label for="prescription">
                    <span>Prescription Consultation</span>
                    <input class="input" id="prescription"  type="text" name="prescription" >
                </label> 
                  
                <label for="examen">
                    <span>Examen_complementaires</span>
                    <input class="input" id="examen" type="text" name="examen" >
                </label> 
            </div>

            

        </p>
        <input class="submit" type="submit" onclick="validation_champs(event)" >

    </form>

    <script>
        function valider_champs_lettres(chaine) {
    if (/^[A-Za-z ]+$/.test(chaine)) {
        return true;
    } else {
        return false;
    }
}

function valider_champs_nombre(num) {
    if (/^[0-9]+$/.test(num) && num < 150 && num > 0) {
        return true;
    } else {
        return false;
    }
}

function valider_champs_vide(chaine) {
    if (chaine !== "") {
        return true;
    } else {
        return false;
    }
}
function validation_champs(event) {
    event.preventDefault();

    var nom = document.getElementsByName("nom")[0].value;
    var prenom = document.getElementsByName("prenom")[0].value;
    var desc = document.getElementsByName("description")[0].value;
    var motif = document.getElementsByName("motif")[0].value;
    var symp = document.getElementsByName("symptomes")[0].value;
    var examen = document.getElementsByName("examen")[0].value;

    if (!valider_champs_lettres(nom)) {
        alert("Nom incorrect");
        return false;
    }

    if (!valider_champs_lettres(prenom)) {
        alert("Prénom incorrect");
        return false;
    }

    if (!valider_champs_vide(desc)) {
        alert("Manque de description");
        return false;
    }

    if (!valider_champs_vide(motif)) {
        alert("Manque de Motif");
        return false;
    }

    if (!valider_champs_vide(symp)) {
        alert("Manque de Symptomes");
        return false;
    }

    if (!valider_champs_vide(examen)) {
        alert("Manque de Examen");
        return false;
    }
    console.log($("form").serialize());
    $.ajax({
        type: "POST",
        url: "../controller/addconsultation.php",
        data: $("form").serialize(),
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Enregistrement réussi!',
                text: 'Les données ont été ajoutées avec succès.'
            });
        },
        error: function (xhr, status, error) {
            console.error("Erreur lors de l'envoi de la requête AJAX", error);
            console.log(xhr.responseText); 
        }
    });

    return false; 
}
document.addEventListener("DOMContentLoaded", function () {
    var date = document.getElementsByName("date")[0];
    var dateActuelle = new Date();
    var dateFormat = dateActuelle.toISOString().slice(0, 10);
    date.value = dateFormat;
});
    </script>
    
   
</body>
</html>