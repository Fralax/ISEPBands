$(".formulaires ul.sousMenuProfil").hide();

$(".formulaires li.toggleSousMenuProfil span").each(function(){
  $(this).replaceWith('<a id = "liensFormulaires" href="#">' + $(this).text() + '<\/a>');
});

// On modifie l'évènement "click" sur les liens dans les items de liste
// qui portent la classe "toggleSubMenu" :
$(".formulaires li.toggleSousMenuProfil > a").click(function(){
  // Si le sous-menu était déjà ouvert, on le referme :
  if($(this).next("ul.sousMenuProfil:visible").length != 0){
    $(this).next("ul.sousMenuProfil").slideUp("normal");
  } else{  // Si le sous-menu est caché, on ferme les autres et on l'affiche
    $(".navigation ul.sousMenuProfil").slideUp("normal");
    $(this).next("ul.sousMenuProfil").slideDown("normal");
  }
    // On empêche le navigateur de suivre le lien :
    return false;
});
