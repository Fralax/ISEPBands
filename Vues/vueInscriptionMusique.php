
<html>

<?php foreach ($intrumentsJoues as list($nomInstrument)) { ?>
  <option value = "<?php echo $nomInstrument ?>" > <?php echo $nomInstrument?> </option>
<?php } ?>

<form class="formMusique" action="index.html" method="post">
  <div class="ajoutInstrument">
    <a href="#form1">Ajouter un instrument</a>
    <div id = "form1" class="instrument">
      <form method="post" action="">
        <p>
          <select name="instrument">
            <option value="0">  </option>
            <?php foreach ($intrumentsNonJoues as list($nomInstrument)) { ?>
              <option value = "<?php echo $nomInstrument ?>" > <?php echo $nomInstrument?> </option>
            <?php } ?>
          </select>
          <select name="niveau<?php echo $nomInstrument?>">
            <option value="0">Débutant</option>
            <option value="1">Intermédiaire</option>
            <option value="2">Avancé</option>
            <option value="3">Confirmé</option>
          </select>
        </p>
        <p> <input type="submit" name="Ajouter" value="Valider"> </p>
</form>
</html>
