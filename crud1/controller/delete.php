<?php
include '../Controller/EventC.php';

$eventC = new EventC();

if (isset($_GET["id_e"])) {
    $eventId = $_GET["id_e"];

   
    $eventC->deleteEvent($eventId);

   
    header('Location: listevents.php');
    exit();
} else {
    $error = "Event ID not provided.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
    
</head>

<body>
    <div id="error">
        <?php if (isset($error)) echo $error; ?>
    </div>

    <h2>Delete Event</h2>
    <hr>

</body>

</html>
