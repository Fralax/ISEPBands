$(document).ready(function(){
  // On cache les sous-menus :
  $(".barreMenu ul.sousMenu").hide();

  $(".barreMenu li.toggleSousMenu span").each(function(){
    $(this).replaceWith('<a href="#">' + $(this).text() + '<\/a>');
  });

  $(".barreMenu li.toggleSousMenuConnexion span").each(function(){
    $(this).replaceWith('<a href="#?connexion" rel="popupConnexion" class="connexionPopup">' + $(this).text() + '<\/a>');
  });

  $(".barreMenu li.toggleSousMenuInscription span").each(function(){
    $(this).replaceWith('<a href="#?inscription" rel="popupInscription" class="inscriptionPopup">' + $(this).text() + '<\/a>');
  });

  // On modifie l'évènement "click" sur les liens dans les items de liste
  // qui portent la classe "toggleSubMenu" :
  $(".barreMenu li.toggleSousMenu > a").click(function(){
    // Si le sous-menu était déjà ouvert, on le referme :
    if($(this).next("ul.sousMenu:visible").length != 0){
      $(this).next("ul.sousMenu").slideUp("normal");
    } else{  // Si le sous-menu est caché, on ferme les autres et on l'affiche
      $(".navigation ul.sousMenu").slideUp("normal");
      $(this).next("ul.sousMenu").slideDown("normal");
    }
      // On empêche le navigateur de suivre le lien :
  });

  $('a[href^=#]').click(function() {
  	var popID = $(this).attr('rel'); //Trouver la pop-up correspondante
  	var popURL = $(this).attr('href'); //Retrouver la largeur dans le href

  	//Récupérer les variables depuis le lien
  	var query= popURL.split('?');
  	var dim= query[1].split('&amp;');

  	//Faire apparaitre la pop-up et ajouter le bouton de fermeture
    if (popID == "popupConnexion") {
      $('#' + popID).fadeIn().css({
        'width': 500
      });
    } else{
      $('#' + popID).fadeIn().css({
        'width': 620
      });
    }

  	//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
  	var popMargTop = ($('#' + popID).height() + 80) / 2;
  	var popMargLeft = ($('#' + popID).width() + 80) / 2;

  	//On affecte le margin
  	$('#' + popID).css({
  		'margin-top' : -popMargTop,
  		'margin-left' : -popMargLeft
  	});

  	//Effet fade-in du fond opaque
  	$('body').append('<div id="fade"></div>'); //Ajout du fond opaque noir
  	//Apparition du fond
  	$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

    $('a.close, #fade').live('click', function() { //Au clic sur le bouton ou sur le calque...
      $('#fade , .popup_block').fadeOut(function() {
        $('#fade, a.close').remove();  //...ils disparaissent ensemble
      });
    });
  });
  return false;
});
