$(function(){
var divs = $(".formMusique"); //nom de la classe qui correspond a tous les formulaires de js
divs.hide();
$("a[href^=#]").click(function(){
  if (divs.filter(":visible") == $($(this).attr("href"))) { //if magique a utiliser avec les a href #form
    divs.filter(":visible").slideUp();
  } else {
    divs.filter(":visible").slideUp();
    $($(this).attr("href")).slideDown();
  }
  return false;
});
});
