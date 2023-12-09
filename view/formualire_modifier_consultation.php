<?php

include '../controller/consultationR.php';

$error = "";

$cosnult = null;

$cons = new consultationfunction();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/formualire_modifier_consultation/formulaire_modifier_consultation.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Modifier Consultation</title>
</head>
<body>

<div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['id_c'])) {
        $consult = $cons->getConsult($_GET['id_c']);

    ?>
    <form class="form" method="POST" action="../controller/updateconsultation.php" onsubmit="return confirmUpdate(event)">
        <p class="title">Modifier Consultation</p>
        <p class="message">Information Consultation</p>
        <div class="flex">
            <label>
                <span>ID_Consultaion : </span>
                <input class="input" type="text" name="id_c" value="<?php echo $consult['id_c'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Description Consultation :</span>
                <input class="input" type="text" name="description" value="<?php echo $consult['description_consultation'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Symptomes :</span>
                <input class="input" type="text" name="symptomes" value="<?php echo $consult['symptomes'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Prescription Consultation :</span>
                <input class="input" type="text" name="prescription" value="<?php echo $consult['prescription_consultation'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Examen Consultation:</span>
                <input class="input" type="text" name="examen" value="<?php echo $consult['examen_consultation'] ; ?>">
            </label>
        </div>
        <input class="submit" type="submit" >
    </form>

    <?php
    }
    ?>
<script>
function confirmUpdate(event) {
    event.preventDefault();  

    Swal.fire({
        title: 'Modification Consultation?',
        text: 'Vous êtes sur le point de mettre à jour la consultation.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, mettre à jour!'
    }).then((result) => {
        if (result.isConfirmed) {
            submitForm();
        }
    });
}

function submitForm() {
    var form = document.querySelector('.form');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.onload = function () {
        console.log(xhr.responseText);
        window.location.href = '../view/consulter_consultation.php';
    };
    xhr.send(formData);
}
</script>

</body>
</html>