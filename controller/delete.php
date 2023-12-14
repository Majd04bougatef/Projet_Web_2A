<?php
include '../Controller/EventC.php';

$eventC = new EventC();

if (isset($_GET["id_e"])) {
    $eventId = $_GET["id_e"];

   
    $eventC->deleteEvent($eventId);

   
    echo '<script>window.location.href = "../controller/listevents.php";</script>';
    exit();
} else {
    $error = "Event ID not provided.";
}

?>


