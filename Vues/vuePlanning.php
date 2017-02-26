<?php

  require_once 'Controleurs/controleurMembres.php';
  require_once 'Controleurs/controleurAdmin.php';
  $membre = new controleurMembres();
  $admin = new controleurAdmin();

  $verificationSessionExiste = $membre->verificationSessionExiste();
  $verificationSessionValide = $membre->verificationSessionValide();
  $verificationMembreValide = $membre->verificationMembreValide();
  $verificationAdmin = $admin->verificationAdmin();
  $verificationMembreBanniBySession = $membre->verificationMembreBanni($_SESSION['id']);

  if ($verificationSessionExiste == true) {
    if ($verificationMembreValide == true) {
      if ($verificationAdmin == true) {
        $admn = 1;
      }
      if ($verificationMembreBanniBySession == true) {
        $t = 2;
      } else{
        $t = 1;
      }
    } else{
      $t = 2;
    }
  } else{
    $t = 3;
  }

?>

<div class="container">

  <div id="loader"></div>
  <div id="emptyDiv"></div>
  <div id="calendar" class="animate-bottom"></div>

  <div id="popupCreerEvenement" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content popups">
        <form action="" method="post" name="formulaireEvenement" enctype="multipart/form-data">
          <p>Choisissez le groupe avec lequel vous voulez réserver le local !</p>
          <select name="groupe">
            <?php foreach ($mesGroupes as list($nomGroupe)): ?>
              <option value="<?php echo $nomGroupe ?>"> <?php echo $nomGroupe ?>  </option>
            <?php endforeach; ?>
          </select>
          <p>
            <input class="boutonsFormulaires" type="submit" name="creerEvenement" value="Valider">
            <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
          </p>
        </form>
      </div>
    </div>
  </div>

  <?php 
    if ($t == 3) {
      header("Location: index.php?page=erreur404");
    }
  ?>

</div>

<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>
<script src='fullcalendar/locale/fr.js'></script>
<script type="text/javascript">
  var statut = '<?php echo $t ?>';
  var administrateur = '<?php echo $admn ?>';
  var mesGroupes = '<?php echo json_encode($mesGroupes) ?>';
</script>
<script src='JS/planning.js'></script>


