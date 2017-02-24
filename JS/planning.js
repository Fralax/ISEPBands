$(document).ready(function() {

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();
  var eventsFromCalendar = $('#calendar').fullCalendar('clientEvents');

  if(dd<10) {
      dd='0'+dd
  }

  if(mm<10) {
      mm='0'+mm
  }

  today = yyyy+'-'+mm+'-'+dd;

  $('#calendar').fullCalendar({

    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaWeek,agendaDay,listWeek'
    },

    defaultView: 'agendaWeek',
    defaultDate: today,
    editable: true,
    navLinks: true, // can click day/week names to navigate views
    eventLimit: true, // allow "more" link when too many events

    events: {
      url: 'index.php?page=evenements',
    },



  });

});
