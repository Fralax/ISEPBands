<?php $this->titre = "Profil" ?>

<?php

require_once 'Controleurs/controleurMembres.php';
$membre = new controleurMembres();
$verificationSession = $membre->verificationSession();
$verificationValide = $membre->verificationValide();

if ($verificationSession == true) {
  if ($verificationValide == true) {
    $i = 0;
  } else{
    $i = 1;
  }
} else{
  $i = 1;
}

?>

<?php if ($i == 1): ?>
  <div class="inscriptionConfirmee">
    <p>
      Bienvenue <?php echo $_SESSION['prenom'] ?> ! Et si tu complétais un peu ton profil en attendant qu'un membre du bureau valide ton inscription ?
    </p>
  </div>
<?php endif; ?>

<?php if ($instrumentsJoues): ?>
  Mes instruments :
  <table>
    <?php foreach ($instrumentsJoues as list($instrument, $niveau, $annees)): ?>
      <tr>
          <td>
            <?php echo $instrument ?>
          </td>
          <td>
            <?php echo "niveau : ".$niveau ?>
          </td>
          <td>
            <?php
              if ($annees <= 1) {
                echo $annees." année d'expérience";
              } else{
                echo $annees." années d'expérience";
              }
            ?>
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
      <select name="annees">
        <?php for ($i=0; $i <= 20; $i++) { ?>
          <?php if ($i<=1) { ?>
            <option value="<?php echo $i ?>"><?php echo $i ?> an</option>
          <?php } else { ?>
            <option value="<?php echo $i ?>"><?php echo $i ?> ans</option>
          <?php } ?>
        <?php } ?>
      </select>
    </p>
    <p> <input type="submit" name="ajouterInstrumentPratique" value="Valider"> </p>
  </form>
</div>

<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
<script src="JS/formulaireInstruments.js"></script>
