<?php
include_once '../config.php';
include_once '../Controller/EventC.php';

$error = "";
$eventC = new EventC();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $requiredFields = ['eventName', 'eventDescription', 'eventLocation', 'eventDate', 'eventEndDate', 'eventCapacity', 'idUser',];
    $missingFields = [];

    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $missingFields[] = $field;
        }
    }

    if (empty($missingFields)) {

        $event = new Event(
            null,
            $_POST['eventName'],
            $_POST['eventDescription'],
            '',
            $_POST['eventLocation'],
            $_POST['eventDate'],
            $_POST['eventEndDate'],
            intval($_POST['eventCapacity']),
            $_POST['idUser'],
            $_FILES['eventImage']['name']
        );

        if ($eventC->userExists($_POST['idUser'])) {

            $uploadDir = 'images/';
            $uploadedFile = $uploadDir . basename($_FILES['eventImage']['name']);


            if (move_uploaded_file($_FILES['eventImage']['tmp_name'], $uploadedFile)) {
                $event->setImage($uploadedFile);


                $eventC->addEvent($event);


                header('Location: listevents.php');
                exit();
            } else {
                $error = "Failed to upload the image.";
            }
        } else {
            $error = "User with ID " . $_POST['idUser'] . " does not exist.";
        }
    } else {
        $error = "Missing information for fields: " . implode(', ', $missingFields);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Creation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }

        form {
            margin-top: 10%;
        }

        header {
            background: linear-gradient(rgba(152, 193, 248, 0.4), rgba(255, 248, 248, 0.4)),
                url(https://i.pinimg.com/564x/b8/d9/db/b8d9dbbecf1144a150f4230255a112d4.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: stretch;
            text-align: center;
            padding: 20rem;
        }

        .container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .modal {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            box-shadow: 0 15px 30px 0 rgba(0, 125, 171, 0.15);
            border-radius: 10px;
        }

        .modal__header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal__body {
            padding: 1rem 1rem;
        }

        .modal__footer {
            padding: 0 1.5rem 1.5rem;
        }

        .modal__title {
            font-weight: 700;
            font-size: 1.25rem;
        }

        .button {
            display: inline-flex;
            align-items: centers;
            justify-content: center;
            transition: 0.15s ease;
        }

        .button--icon {
            width: 2.5rem;
            height: 2.5rem;
            background-color: transparent;
            border-radius: 0.25rem;
        }

        .button--icon:focus,
        .button--icon:hover {
            background-color: #ededed;
        }

        .button--primary {
            background-color: #007dab;
            color: #FFF;
            padding: 0.75rem 1.25rem;
            border-radius: 0.25rem;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .button--primary:hover {
            background-color: #006489;
        }

        .input {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.5rem;
        }

        .input__label {
            font-weight: 700;
            font-size: 0.875rem;
        }

        .input__field {
            display: block;
            margin-top: 0.5rem;
            border: 1px solid #DDD;
            border-radius: 0.25rem;
            padding: 0.75rem 0.75rem;
            transition: 0.15s ease;
        }

        .input__field:focus {
            outline: none;
            border-color: #007dab;
            box-shadow: 0 0 0 1px #007dab, 0 0 0 4px rgba(0, 125, 171, 0.3);
        }

        .input__error {
            margin-top: 0.25rem;
            font-size: 0.75rem;
            color: #ff1a1a;
        }
    </style>
</head>

<body>


    <header>
        <h1 style="color: #fff;">Event Creation</h1>
    </header>
    <div class="container">
        <div class="modal">
            <div class="modal__header">
                <h2 class="modal__title">Add New Event</h2>
            </div>
            <div class="modal__body">
                <?php if ($error): ?>
                    <div class="input__error">
                        <?= $error; ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="input">
                        <label class="input__label" for="eventName">Event Name</label>
                        <input class="input__field" type="text" name="eventName" id="eventName" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventDescription">Event Description</label>
                        <textarea class="input__field" name="eventDescription" id="eventDescription" rows="4"
                            required></textarea>
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventLocation">Event Location</label>
                        <input class="input__field" type="text" name="eventLocation" id="eventLocation" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventDate">Event Date</label>
                        <input class="input__field" type="datetime-local" name="eventDate" id="eventDate" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventEndDate">Event End Date</label>
                        <input class="input__field" type="datetime-local" name="eventEndDate" id="eventEndDate"
                            required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventCapacity">Event Capacity</label>
                        <input class="input__field" type="number" name="eventCapacity" id="eventCapacity" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="idUser">User ID</label>
                        <input class="input__field" type="text" name="idUser" id="idUser" required>
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventImage">Event Image</label>
                        <input class="input__field" type="file" name="eventImage" id="eventImage" accept="image/*"
                            required>
                    </div>
                    <div class="modal__footer">
                        <button class="button button--primary" type="submit">Add Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

