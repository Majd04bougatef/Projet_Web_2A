<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... Vos balises meta et autres ... -->
    <title>Calendrier des événements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css"
        media="print" />
    <!-- Utilisez la dernière version de FullCalendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css" media="print" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <?php
    include_once '../config.php';
    include_once '../Controller/EventC.php';

    $eventC = new EventC();
    $events = $eventC->showCalendar();

    // Formatage des données directement en JavaScript
    echo '<script>';
    echo 'var eventsFormatted = [';
    foreach ($events as $index => $event) {
        echo '{';
        echo 'title: ' . json_encode(isset($event['titre_event']) ? $event['titre_event'] : '') . ',';
        echo 'start: ' . json_encode(isset($event['date_debut']) ? date('Y-m-d H:i:s', strtotime($event['date_debut'])) : '') . ',';
        echo 'end: ' . json_encode(isset($event['date_fin']) ? date('Y-m-d H:i:s', strtotime($event['date_fin'])) : '') . ',';
        echo 'url: ' . json_encode('event_details.php?id_event=' . (isset($event['id_e']) ? $event['id_e'] : '')) . '';
        echo '}';

        // Ajoutez une virgule après chaque élément, sauf le dernier
        if ($index < count($events) - 1) {
            echo ',';
        }
    }
    echo '];';
    echo '</script>';
    ?>
</head>

<body>
    <div class="head" style="display: flex; justify-content: space-between; align-items: center; width: 99%; ">
        <a href="../view/index.php"><i class='bx bx-menu' style="font-size: 50px; color: black;"></i></a>

        <form method="post" action="" style="text-align: center; margin: 0 auto;">
            <div class="name-med">
                <h1 style="font-size: 4em; color: #333; font-weight: bold; margin-bottom: 20px;">Calendrier des
                    evenements</h1>
                <br>
                <h4 style="font-size: 2em; color: #333; font-weight: bold;">Semaine :
                    <input type="date" name="date" id="datePicker">
                    <input type="submit" value="Afficher"
                        style="padding: 10px 20px; font-size: 20px; font-weight: bold; text-transform: uppercase; background-color: #0077B6; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
                </h4>
            </div>
        </form>
    </div>
    <div id="calendar"></div>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                events: eventsFormatted,
               
            });
        });
    </script>
</body>

</html>
