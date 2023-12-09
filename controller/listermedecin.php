

<?php


include '../controller/consultationR.php'; 

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (!empty($id)) {
        $consult = new consultationfunction();
        $list = $consult->lister_Medecin($id);

  
        $options = '';
        foreach ($list as $med) {
            $options .= '<option value="' . $med['id_med'] . '">' . $med['nom'] . '  ' . $med['prenom'] . '</option>';
        }

        echo $options;
    }
}
?>
