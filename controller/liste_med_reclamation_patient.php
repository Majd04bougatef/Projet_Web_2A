<?php
include '../controller/rdvC.php';
$rdv = new rdvC();

if (isset($_POST['specialité'])) {
    $selectedSpecialite = $_POST['specialité'];
    $listMedecins = $rdv->listMedecinsBySpecialite($selectedSpecialite);

    echo '<table class="table">';
    echo '<thead><tr> <th>Image</th><th>Nom</th><th>Prenom</th><th>Réclamer</th></tr></thead>';
    echo '<tbody>';

    foreach ($listMedecins as $medecin) {
        echo '<tr>';
        echo '<td><img width="50px" height="50px" src="../view/images/' . $medecin['image'] . '"></td>';
        echo '<td>' . $medecin['nom'] . '</td>';
        echo '<td>' . $medecin['prenom'] . '</td>';
        echo '<td><a href="../view/ajouterReclamationFrontPatient1.php?id_med=' . $medecin['id_user'] . '"><button>Réclamer</button></a></td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
}
?>
