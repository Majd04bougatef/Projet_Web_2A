<?php
    include_once("../controller/ordonnanceR.php");

    $ordR = new ordonnancefunction();
    $ordR2 = new ordonnancefunction();
    $ordR3 = new ordonnancefunction();

    $liste = $ordR->list_Pat_consult($_GET['id_rdv']);
    $liste2 = $ordR->list_Med_consult($_GET['id_rdv']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/formualire_ordonnance/formualire_ordonnance.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <form id="ordonnanceForm" method="POST" action="">
        <div class="title"><h1>Ordonnance </h1></div>
        <h2>Information Patient</h2>
        <div class="info">
            <label for="nomPatient">Nom :</label>
            <input type="text" id="nomPatient" name="nomPatient" value="<?php echo $liste['nom'];?>">
            <label for="prenomPatient">Prénom :</label>
            <input type="text" id="prenomPatient" name="prenomPatient" value="<?php echo $liste['prenom'];?>">
            <label for="agePatient">Âge :</label>
            <input type="number" id="agePatient" name="agePatient" value="<?php echo $liste['age'];?>">
        </div>
        <h2>Information Médicaments</h2>
        <div class="info">
            <label for="nomMedecin">Nom Médecin :</label>
            <input type="text" id="nomMedecin" name="nomMedecin"  value="<?php echo $liste2['nom'];?>">
            <label for="prenomMedecin">Prénom Médecin :</label>
            <input type="text" id="prenomMedecin" name="prenomMedecin" value="<?php echo $liste2['prenom'];?>">
        </div>
        <h3>Liste des Médicaments</h3>
        <table class="medicaments-table">
            <thead>
                <tr>
                    <th>Nom Médicament</th>
                    <th>Posologie par jour</th>
                    <th>Remarques</th>
                </tr>
            </thead>
            <tbody id="medicamentsList">
            <?php
                $medicaments = $ordR3->list_Medicament_consult($_GET['id_rdv']);
                foreach ($medicaments as $medicament) {
                    echo '<input type="hidden" name="date" value="'.$medicament['date_consultation'].'">';
                    echo '<input type="hidden" name="ex" value="'.$medicament['examen_consultation'].'">';
                    echo '<input type="hidden" name="id_c" value="'.$medicament['id_c'].'">';
                    $listeMedicaments = explode(', ', $medicament['examen_consultation']);
                    foreach ($listeMedicaments as $nomMedicament) {
                        echo '<tr>';
                        echo '<td><input type="text" name="nomMedicament[]" value="' . $nomMedicament . '" required></td>';
                        echo '<td>
                                <input type="number" class="posologie-input" name="posologie[]" value="1" min="1">
                                <span class="plus-minus-btn" onclick="incrementer(this)">+</span>
                                <span class="plus-minus-btn" onclick="decrementer(this)">-</span>
                            </td>';
                        echo '<td><input type="text" name="remarques[]" value=""></td>'; 
                        echo '</tr>';
                    }
                }
            ?>
            </tbody>
        </table>
        <button type="submit" id="preparerOrdonnance">Enregistrer Ordonnance</button>

        <div id="successMessage" class="hidden success-animation" style="background-color:#7bba7d; color: white; padding: 10px;">
            L'ordonnance a été ajoutée avec succès!
        </div>
    </form>

    <script>
    function incrementer(btn) {
        var input = btn.previousElementSibling;
        input.value = parseInt(input.value) + 1;
    }

    function decrementer(btn) {
        var input = btn.previousElementSibling.previousElementSibling;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '../controller/addordonnance.php',
                data: $(this).serialize(),
                success: function (response) {
                    showSuccessMessage();
                    console.log(response);
            
                    $('#successMessage').append('<br><a href="#" id="downloadPDF">Télécharger le PDF</a>');
                },
                error: function () {
                    console.log('Une erreur s\'est produite');
                }
            });
        });

        function showSuccessMessage() {
            $('#successMessage').removeClass('hidden');
        }

        $('#successMessage').on('click', '#downloadPDF', function (e) {
            e.preventDefault();
            window.location.href = '../view/ordonnance_pdf.php?' + $('form').serialize();
        });
    });
</script>

</body>
</html>
