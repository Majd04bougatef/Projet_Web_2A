$(document).ready(function() {
    // Initialiser le calendrier
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'month',
        events: [
            {
                title: 'Événement de test',
                start: '2023-12-01',
                end: '2023-12-02',
                url: 'event_details.php?id_event=1'
            },
            // Ajoutez d'autres événements statiques si nécessaire
        ]
    });
});
