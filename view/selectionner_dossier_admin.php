<?php
    include '../controller/consultationR.php';

    $consult = new consultationfunction();
    $list = [];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if (!empty($id)) {
            $list = $consult->lister_Medecin($id);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/consulter consultation/consulter_Consultation.css"> 
    <title>Consulter Dossier</title>
</head>
<body>
    <form class="form" method="POST" action="../view/dossier_patient.php" id="consultForm" onsubmit="return valider_champs()">
        <p class="title">Consulter Dossier</p>
        <p class="message">Information du Patient</p>
        


            <div class="flex">
                <label>
                    <span>ID Patient : *</span>
                    <input class="input" type="text" name="id">
                </label>

                <label>
                    <form>
                        <span>Medecin : *</span>
                        <select name="medecin" id="medecinSelect">
                            <option>Selectionner un medecin</option>
                            <?php
                                foreach ($list as $med){
                            ?>
                                <option value="<?php echo $med['id_med']; ?>"><?php echo $med['nom'].'  '.$med['prenom']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <input class="submit" type="button" value="Afficher Médecin" onclick="submitForm('selectionner_dossier.php')">
                    </form>
                                    <input class="submit" type="submit" value="Consulter" onclick="submitForm('../view/dossier_patient.php')">

                </label>

            </div>

          
           
        </p>
        

    </form>

    <script>
        function valider_champs() {
            var id = document.getElementsByName("id")[0].value;

            if (id === "") {
                alert("Donner une ID");
                event.preventDefault();
                return false;
            }

            if (id.length !== 10) {
                alert("L'ID doit avoir une longueur de 10 caractères");
                event.preventDefault();
                return false;
            }

            return true;
        }

        function submitForm(action) {
            document.getElementById("consultForm").action = action;
            document.getElementById("consultForm").submit();
        }
    </script>
</body>
</html>
