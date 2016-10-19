<?php $this->titre = "Inscription" ?>

<?php if ($instrumentsJoues): ?>
  Mes instruments :
  <table>
    <?php foreach ($instrumentsJoues as list($instrument, $niveau)): ?>
      <tr>
          <td>
            <?php echo $instrument ?>
          </td>
          <td>
            <?php echo "niveau : ".$niveau ?>
          </td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>

<a href="#form1">Ajouter un instrument</a>
<div id = "form1" class="formMusique">
  <form method="post" action="">
    <p>
      <select name="instrument">
        <?php foreach ($intrumentsNonJoues as list($nomInstrument)) { ?>
          <option value = "<?php echo $nomInstrument ?>" > <?php echo $nomInstrument?> </option>
        <?php } ?>
      </select>
      <select name="niveau">
        <option value="Débutant">Débutant</option>
        <option value="Intermédiaire">Intermédiaire</option>
        <option value="Avancé">Avancé</option>
        <option value="Confirmé">Confirmé</option>
      </select>
    </p>
    <p> <input type="submit" name="ajouterInstrumentPratique" value="Valider"> </p>
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
