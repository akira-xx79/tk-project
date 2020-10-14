document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },

      locale: 'ja',
    //   defaultDate: '2020-05-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      firstDay : 1,
      height: 650,
      eventDurationEditable : false,
      selectLongPressDelay:0,
      handleWindowResize: true,

      events: routeEvents('routeLoadEvents'),

      eventColor: '#00008b',
      eventTextColor: 'white' ,


      eventClick: function(info, jsEvent, view) {

        alert('顧客名:    ' + info.event.groupId);
        // alert('View: ' + info.view.type);

        info.el.style.borderColor = 'red';
      }
    });

    calendar.render();
  });
