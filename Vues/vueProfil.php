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

<div class="profilGeneral">
  <div class="informationsProfil">
    <p> Informations </p>
    <table>
      <tr>
        <td>
          Email :
        </td>
        <td>
          <?php echo $infos['u_email'] ?>
        </td>
      </tr>
      <tr>
        <td>
          Portable :
        </td>
        <td>
          <?php echo $infos['u_portable'] ?>
        </td>
      </tr>
      <tr>
        <td>
          Promo :
        </td>
        <td>
          <?php echo $infos['u_promo'] ?>
        </td>
      </tr>
      <tr>
        <td>
          Date d'inscription :
        </td>
        <td>
          <?php echo $infos['u_dateInscription'] ?>
        </td>
      </tr>
    </table>
  </div>

  <?php if ($instrumentsJoues): ?>
    <div class="instrumentsProfil">
      <p> Instruments </p>
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
    </div>
  <?php endif; ?>
</div>

<div class="formulairesProfil">
  <nav>
    <ul class = "ajouterInstrumentsProfil">
      <li class = "toggleSousMenuProfil"> <span>Ajouter un Instrument</span>
        <ul class = "sousMenuProfil">
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
        </ul>
      </li>
    </ul>
  </nav>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="JS/formulaireInstruments.js"></script>
