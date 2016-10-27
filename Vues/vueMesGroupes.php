<?php $this->titre = "Groupe" ?>

<a href="#form1">Ajouter un groupe</a>
<div id = "form1" class="formGroupe">
  <form method="post" action="">
    <p>
      <input type="text" name="nomGroupe" value="">
      <input type="submit" name="Valider" value="">
    </p>
  </form>
</div>

<p> <a href="index.php?page=accueil">Finaliser l'inscription</a> <p>


<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
  $(function(){
  var divs = $(".formMusique"); //nom de la classe qui correspond a tous les formulaires de js
  divs.hide();
  $("a").click(function(){
    if (divs.filter(":visible") == $($(this).attr("href"))) { //if magique a utiliser avec les a href #form
      divs.filter(":visible").slideUp();
    } else {
      divs.filter(":visible").slideUp();
      $($(this).attr("href")).slideDown();
    }
    return false;
  });
});
</script>
