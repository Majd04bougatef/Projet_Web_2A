<?php
include_once '../config.php';
include_once '../Controller/EventC.php';

$eventC = new EventC();
$events = $eventC->showCalendar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... Vos balises meta et autres ... -->
    <title>Calendrier des événements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css" media="print" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../Controller/calendrier.css" /> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</head>


<body>
<div class="head" style="display: flex; justify-content: space-between; align-items: center; width: 99%; ">
    <a href="../view/index.php"><i class='bx bx-menu' style="font-size: 50px; color: black;"></i></a>

    <form method="post" action="" style="text-align: center; margin: 0 auto;">
        <div class="name-med">
            <h1 style="font-size: 4em; color: #333; font-weight: bold; margin-bottom: 20px;">Calendrier des evenements</h1>
            <br>
            <h4 style="font-size: 2em; color: #333; font-weight: bold;">Semaine :
                <input type="date" name="date" id="datePicker">
                <input type="submit" value="Afficher" style="padding: 10px 20px; font-size: 20px; font-weight: bold; text-transform: uppercase; background-color: #0077B6; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
            </h4>
        </div>
    </form>
</div>
    <div id="calendar"></div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                events: [
                    <?php foreach ($events as $event): ?>
                        {
                            title: '<?php echo isset($event['titre_event']) ? $event['titre_event'] : ''; ?>',
                            start: '<?php echo isset($event['date_debut']) ? $event['date_debut'] : ''; ?>',
                            end: '<?php echo isset($event['date_fin']) ? $event['date_fin'] : ''; ?>',
                            url: 'event_details.php?id_event=<?php echo isset($event['id_e']) ? $event['id_e'] : ''; ?>'
                        },
                    <?php endforeach; ?>
                ]
            });
        });
    </script>
</body>

</html>
