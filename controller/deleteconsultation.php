<?php
include '../controller/consultationR.php';

$consult = new consultationfunction();

if (isset($_POST['id_c'])) {
    $id_c = $_POST['id_c'];
    $consult->deleteConsult($id_c);
    echo json_encode(['success' => true]);
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Consultation ID not provided.']);
}
?>