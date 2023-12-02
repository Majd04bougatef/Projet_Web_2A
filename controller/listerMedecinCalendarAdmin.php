<?php


include '../controller/consultationR.php';
$consultR = new consultationfunction();



if (isset($_POST['specialité'])) {
  $selectedSpecialite = $_POST['specialité'];
  $listMedecins = $consultR->listMedecinsBySpecialite($selectedSpecialite);

  $options = '<select name="medecin">';
  foreach ($listMedecins as $medecin) {
    $options .= '<option value="' . $medecin['id_user'] . '">' . $medecin['nom'] . ' ' . $medecin['prenom'] . '</option>';
  }
  $options .= '</select>';

  echo $options;
}
?>
