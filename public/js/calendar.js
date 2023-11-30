document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      initialDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      events:routeEvents('routeLoadEvents'),
    });
    
    calendar.render();
});
console.log(routeEvents('routeLoadEvents'));
