$(document).ready(function(){
  // On cache les sous-menus :
  $(".barreMenu ul.sousMenu").hide();

  $(".barreMenu li.toggleSousMenu span").each(function(){
    $(this).replaceWith('<a href="#">' + $(this).text() + '<\/a>');
  });


  $(".barreMenu li.toggleSousMenu > a").click(function(){
    // Si le sous-menu était déjà ouvert, on le referme :
    if($(this).next("ul.sousMenu:visible").length != 0){
      $(this).next("ul.sousMenu").slideUp("normal");
    } else{  // Si le sous-menu est caché, on ferme les autres et on l'affiche
      $(".navigation ul.sousMenu").slideUp("normal");
      $(this).next("ul.sousMenu").slideDown("normal");
    }
      // On empêche le navigateur de suivre le lien :
      return false;
  });
});
