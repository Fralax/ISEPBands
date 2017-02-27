$(document).ready(function () {

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  var eventsFromCalendar = $('#calendar').fullCalendar('clientEvents');
  var groupes = JSON.parse(mesGroupes);
  var nomsGroupes = [];

  $.each(groupes, function (i) {
    nomsGroupes.push(groupes[i].g_nom);
  });

  if (dd < 10) {
    dd = '0' + dd
  }

  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy + '-' + mm + '-' + dd;

  if (administrateur == 1) {
    $('#calendar').fullCalendar({

      loading: function (bool) {
        if (bool) {
          $('#emptyDiv').show();
          $('#calendar').hide();
          $('#loader').fadeIn();
        } else {
          $('#emptyDiv').hide();
          $('#loader').fadeOut();
          $('#calendar').fadeIn();
        }
        //Possibly call you feed loader to add the next feed in line
      },

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaWeek,agendaDay,listWeek'
      },

      defaultView: 'agendaWeek',
      minTime: "08:00:00",
      maxtime: "21:00:00",
      aspectRatio: 1.8,
      defaultDate: today,
      allDaySlot: false,
      selectable: true,
      selectHelper: true,
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

        $('#popupCreerEvenement').on('hide.bs.modal', function (e) {
          $("form[name='formulaireEvenement']").unbind();
          $('#calendar').fullCalendar("unselect");
        })

        $("form[name='formulaireEvenement']").submit(function (e) {
          var groupe = $("select[name='groupe'] option:selected").val();

          $.ajax({
            url: 'index.php?page=ajaxcreationevenement',
            data: 'groupe=' + encodeURIComponent(groupe) + '&start=' + start + '&end=' + end,
            type: "POST",
            success: function (json) {
              console.log('Événement ajouté');
              location.reload();
            }
          });
          $("#popupCreerEvenement").modal('hide');
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
          data: 'groupe=' + encodeURIComponent(event.title) + '&id=' + event.id + '&start=' + start + '&end=' + end,
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
          data: 'groupe=' + encodeURIComponent(event.title) + '&id=' + event.id + '&start=' + start + '&end=' + end,
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
            data: "id=" + event.id + "&groupe=" + encodeURIComponent(event.title),
            success: function (json) {
              console.log(event.id);
              console.log("Événement supprimé.");
            }
          });

          $('#calendar').fullCalendar('removeEvents', event.id);

        }
      }

    });

  };

  if (statut == 1) {

    $('#calendar').fullCalendar({

      loading: function (bool) {
        if (bool) {
          $('#emptyDiv').show();
          $('#calendar').hide();
          $('#loader').fadeIn();
        } else {
          $('#emptyDiv').hide();
          $('#loader').fadeOut();
          $('#calendar').fadeIn();
        }
        //Possibly call you feed loader to add the next feed in line
      },

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaWeek,agendaDay,listWeek'
      },

      defaultView: 'agendaWeek',
      minTime: "08:00:00",
      maxtime: "21:00:00",
      defaultDate: today,
      aspectRatio: 1.8,
      allDaySlot: false,
      selectable: true,
      selectHelper: true,
      editable: false,
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events
      eventSources: [
        {
          url: 'index.php?page=ajaxrecuperationevenementsmesgroupes',
          editable: true
        },
        {
          url: 'index.php?page=ajaxrecuperationevenementsautresgroupes',
          editable: false
        }
      ],

      select: function (start, end) {
        var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
        $("#popupCreerEvenement").modal();

        $('#popupCreerEvenement').on('hide.bs.modal', function (e) {
          $("form[name='formulaireEvenement']").unbind();
          $('#calendar').fullCalendar("unselect");
        })

        $("form[name='formulaireEvenement']").submit(function (e) {
          var groupe = $("select[name='groupe'] option:selected").val();

          $.ajax({
            url: 'index.php?page=ajaxcreationevenement',
            data: 'groupe=' + encodeURIComponent(groupe) + '&start=' + start + '&end=' + end,
            type: "POST",
            success: function (json) {
              console.log('Événement ajouté');
              location.reload();
            }
          });
          $("#popupCreerEvenement").modal('hide');
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
          data: 'groupe=' + encodeURIComponent(event.title) + '&id=' + event.id + '&start=' + start + '&end=' + end,
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
          data: 'groupe=' + encodeURIComponent(event.title) + '&id=' + event.id + '&start=' + start + '&end=' + end,
          success: function (json) {
            console.log("Événement mis à jour");
          }
        });
      },

      eventClick: function (event) {
        var a;
        console.log(event.title);
        console.log(nomsGroupes);
        if ($.inArray(event.title, nomsGroupes) == -1) {
          a = 0;
        } else {
          a = 1;
        }
        console.log(a);

        if (a == 1) {
          if (confirm("Voulez-vous vraiment supprimer cet événement ?")) {
            $.ajax({
              url: "index.php?page=ajaxsuppressionevenement",
              type: "POST",
              data: "id=" + event.id + "&groupe=" + encodeURIComponent(event.title),
              success: function (json) {
                console.log(event.id);
                console.log("Événement supprimé.");
              }
            });

            $('#calendar').fullCalendar('removeEvents', event.id);

          }
        }
      }


    });

  };

  if (statut == 2) {
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
      aspectRatio: 1.8,
      allDaySlot: false,
      selectable: false,
      editable: false,
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events

      events: {
        url: 'index.php?page=ajaxrecuperationevenements',
      }
    });
  };

});
