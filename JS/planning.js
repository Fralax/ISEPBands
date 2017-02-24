$(document).ready(function () {

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();
  var eventsFromCalendar = $('#calendar').fullCalendar('clientEvents');

  if (dd < 10) {
    dd = '0' + dd
  }

  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy + '-' + mm + '-' + dd;

  $('#calendar').fullCalendar({

    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaWeek,agendaDay,listWeek'
    },

    defaultView: 'agendaWeek',
    minTime: "08:00:00",
    maxtime: "21:00:00",
    defaultDate: today,
    allDaySlot: false,
    selectable: true,
    editable: true,
    navLinks: true, // can click day/week names to navigate views
    eventLimit: true, // allow "more" link when too many events

    events: {
      url: 'index.php?page=ajaxrecuperationevenements',
    },

    select: function (start, end) {
      var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
      $("#popupCreerEvenement").modal();

      $("form").submit(function (e) {
        var groupe = $("select[name='groupe'] option:selected").val();

        $.ajax({
          url: 'index.php?page=ajaxcreationevenement',
          data: 'groupe=' + encodeURIComponent(groupe) + '&start=' + start + '&end=' + end,
          type: "POST",
          success: function (json) {
            console.log('Événement ajouté');
          }
        });
        $("#popupCreerEvenement").modal('hide');
        $('#calendar').fullCalendar('renderEvent', { title: groupe, start: start, end: end }, true);
        $('#calendar').fullCalendar('unselect');
        e.preventDefault();
      });
    },

    eventDrop: function (event, delta) {
      var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
      var id = event.id;

      $.ajax({
        url: 'index.php?page=ajaxmodificationevenement',
        type: "POST",
        data: 'id=' + id + '&start=' + start + '&end=' + end,
        success: function (json) {
          console.log("Événement mis à jour");
        }
      });
    },

    eventResize: function (event) {
      var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");

      $.ajax({
        url: 'index.php?page=ajaxmodificationevenement',
        type: "POST",
        data: 'id=' + event.id + '&start=' + start + '&end=' + end,
        success: function (json) {
          console.log("Événement mis à jour");
        }
      });
    },

    eventClick: function (event) {
      if (confirm("Voulez-vous vraiment supprimer cet événement ?")) {
        $.ajax({
          url: "index.php?page=ajaxsuppressionevenement",
          type: "POST",
          data: "id=" + event.id,
          success: function (json) {
            console.log(event.id);
            console.log("Événement supprimé.");
          }
        });

        $('#calendar').fullCalendar('removeEvents', event.id);

      }
    }

  });

});
