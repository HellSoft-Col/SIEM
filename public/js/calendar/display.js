$(function () {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        header: {
            left: 'prev, nex today',
            center: 'title',
            rigth: 'month,agendaWeek,agendaDay,listMonth'
        },
        weekNumbers: true,
        eventLimit: true,
        events: 'https://fullcalendar.io/demo-events.jason'
    });
});
