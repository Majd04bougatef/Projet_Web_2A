<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/consulter consultation/consulter_Consultation.css"> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Consulter Dossier</title>
</head>
<body>
    <form class="form" method="POST" action="../view/dossier_patient.php" id="consultForm" onsubmit="return valider_champs()">
        <p class="title">Consulter Dossier</p>
        <p class="message">Information du Patient</p>

        <div class="flex">
            <label>
                <span>ID Patient : *</span>
                <input class="input" type="text" name="id" oninput="valider_champs()">
            </label>

            <label>
                <span>Medecin : *</span>
                <br>
                <select name="medecin" id="medecinSelect" style="height:63px;width:60%;">
                    <option>Selectionner un medecin</option>
                    <?php
                        foreach ($list as $med){
                    ?>
                        <option value="<?php echo $med['id_med']; ?>"><?php echo $med['nom'].'  '.$med['prenom']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </label>
        </div>
        <input class="submit" type="submit" value="Consulter" onclick="submitForm('../view/dossier_patient.php')" >

    </form>

    <script>
        function valider_champs() {
            var id = document.getElementsByName("id")[0].value;

            if (id.length === 10) {
                $.ajax({
                    type: 'POST',
                    url: '../controller/listermedecin.php',
                    data: { id: id },
                    success: function(response) {
                        console.log('Réponse du serveur :', response);
                        $('#medecinSelect').html(response);
                    },
                    error: function() {
                        alert('Erreur lors de la mise à jour de la liste déroulante');
                    }
                });
            }
        }

        function submitForm(action) {
            document.getElementById("consultForm").action = action;
            document.getElementById("consultForm").submit();
        }
    </script>
</body>
</html>
