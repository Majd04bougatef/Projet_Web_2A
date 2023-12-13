<?php
include '../controller/rdvC.php';

if (isset($_POST["id_rdv"])) {

    $rendezvous = new rdvC();
    $id_rdv = $_POST['id_rdv'];
    $rendezvous->deleterdv($id_rdv);
    echo json_encode(['success' => true]);
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'No id_rdv provided']);
}

?>
