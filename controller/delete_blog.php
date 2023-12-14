<?php
include '../controller/blogC.php';



if (isset($_POST["id_b"])) {

    $blogC = new blogC();

$blogC->deleteblog($_POST["id_b"]);

    echo json_encode(['success' => true]);
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'No id_rdv provided']);
}
?>
