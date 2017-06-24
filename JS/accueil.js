$(document).ready(function(){

  var offset = 10;

  $("#boutonplusDAtctualites").click(function(){

    $(".plusDAtctualites").hide();


    $.ajax({
      url: 'index.php?page=plusdactualites',
      data: 'offset=' + offset,
      type: "POST",
      success: function (data) {
        var data = JSON.parse(data);
        console.log(data[0]);
        if (data != '') {
          $.each(data, function(i){

            if (data[i].a_type == "creationEvenement") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p> Le groupe " + data[i].g_nom + " a réservé le local le " + data[i].startDate + " de " + data[i].startHeure + " à " + data[i].endHeure + " ! </p> </div> </div>");
            }
            if (data[i].a_type == "suppressionEvenement") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p> Le groupe " + data[i].g_nom + " a libéré le local le " + data[i].startDate + " de " + data[i].startHeure + " à " + data[i].endHeure + " ! </p> </div> </div>");
            }
            if (data[i].a_type == "ajoutMorceau") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p> Le groupe " + data[i].g_nom + " a ajouté un morceau à son répertoire : " + data[i].j_morceau + ", de " + data[i].j_artiste + " ! </p> </div> </div>");
            }
            if (data[i].a_type == "suppressionGroupe") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p> Le groupe " + data[i].g_nom + " a été supprimé ! </p> </div> </div>");
            }
            if (data[i].a_type == "quitterGroupe") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p>" + data[i].u_prenom + " " + data[i].u_nom + " a quitté le groupe " + data[i].g_nom + " ! </p> </div> </div>");
            }
            if (data[i].a_type == "rejoindreGroupe") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p>" + data[i].u_prenom + " " + data[i].u_nom + " a rejoint le groupe " + data[i].g_nom + " ! </p> </div> </div>");
            }
            if (data[i].a_type == "creationGroupe") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p>" + data[i].u_prenom + " " + data[i].u_nom + " a créé le groupe " + data[i].g_nom + ". </p> </div> </div>");
            }
            if (data[i].a_type == "debannissement") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p>" + data[i].u_prenom + " " + data[i].u_nom + " a été débanni ! </p> </div> </div>");
            }
            if (data[i].a_type == "banniseement") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p>" + data[i].u_prenom + " " + data[i].u_nom + " a été banni ... </p> </div> </div>");
            }
            if (data[i].a_type == "inscription") {
              $('#filActus').append("<div class='actu'> <div class='actu-dateHeure'>" + data[i].date + "</div>" + "<div class='actu-contenu'> <p>" + data[i].u_prenom + " " + data[i].u_nom + " s'est inscrit sur le site ! </p> </div> </div>");
            }

          });

          $(".plusDAtctualites").show();
          offset+= 10;
        }
      }

    });
  });

  // $( window ).resize(function() {
  //   var container_width = $('.widgetFacebook').width();
  //   $('.widgetFacebook').html('<div class="fb-page" data-href="https://www.facebook.com/facebook" data-width="' + container_width + '" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div></div>');
  //   FB.XFBML.parse();
  // });

});
