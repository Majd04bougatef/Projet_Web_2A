<?php


include '../controller/rdvC.php';
$rdv = new rdvC();



if (isset($_POST['specialité'])) {
  $selectedSpecialite = $_POST['specialité'];
  $listMedecins = $rdv->listMedecinsBySpecialite($selectedSpecialite);

  $options = '<select name="medecin">';
  foreach ($listMedecins as $medecin) {
    $options .= '<option value="' . $medecin['id_user'] . '">' . $medecin['nom'] . ' ' . $medecin['prenom'] . '</option>';
  }
  $options .= '</select>';

  echo $options;
}
?>
