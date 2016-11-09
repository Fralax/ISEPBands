<?php
require_once 'Controleurs/controleurGroupes.php';
$groupe = new controleurGroupes();
$verificationCreateurGroupe = $groupe->verificationCreateurGroupe();


foreach ($membres as list($id)) {
    if ($id == $_SESSION['id']) {
      $g = 1;
      break;
    } else{
      $g = 2;
    }
  }
  if ($verificationCreateurGroupe == true) {
    $g = 0;
  }

?>

<div class="container">

  <div class="row row-centered">
    <h1><?php echo $_GET['groupe'] ?></h1>
  </div>

  <div class="row row-centered membresGroupe">
    <h2> Membres </h2>
    <?php foreach ($membres as list($id, $prenom, $nom, $photo)): ?>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-centered membreGroupe">
        <img class="photoGroupeMembre" src="<?php echo $photo ?>" />
        <a href="index.php?page=profil&id=<?php echo $id ?>"> <?php echo $prenom." ".$nom ?></a>
      </div>
    <?php endforeach; ?>
  </div>

  <?php if ($membresInvites): ?>
    <div class="row row-centered">
      <h2>Membres invités</h2>
      <?php foreach ($membresInvites as list($id, $prenom, $nom, $photo)): ?>
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-centered membreGroupe">
          <img class="photoGroupeMembre" src="<?php echo $photo ?>" />
          <a href="index.php?page=profil&id=<?php echo $id ?>"> <?php echo $prenom." ".$nom ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($g == 0): ?>
    <div class="row row-centered">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
        <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupInviterMembre">Invite un membre</button>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
        <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupSupprimerMembre">Supprime un membre</button>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
      <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupModifierNom">Modifie le nom du groupe</button>
    </div>
  </div>
<?php endif; ?>


  <div id="popupInviterMembre" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content popups">
        <p>
          Sélectionne le membre à inviter
        </p>
        <form method="post" action="">
          <p>
            <select class="select" name="membresInvites">
              <?php foreach ($membresNonInvites as list($id, $prenom, $nom)) { ?>
                <option value = "<?php echo $id ?>" > <?php echo $prenom." ".$nom?> </option>
              <?php } ?>
            </select>
          </p>
          <input class="boutonsFormulaires" type="submit" name="inviterMembre" value="Inviter">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </form>
      </div>
    </div>
  </div>

  <div id="popupSupprimerMembre" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content popups">
        <p>
          Sélectionne le membre à supprimer
        </p>
        <form method="post" action="">
          <p>
            <select class="select" name="membres">
              <?php foreach ($membresASupprimer as list($id, $prenom, $nom)) { ?>
                <option value = "<?php echo $id ?>" > <?php echo $prenom." ".$nom?> </option>
              <?php } ?>
            </select>
          </p>
          <input class="boutonsFormulaires" type="submit" name="supprimerMembre" value="Supprimer">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </form>
      </div>
    </div>
  </div>

<div id="popupModifierNom" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content formModifierNom">
      <form method="post" action="">
        <p>
          Nouveau nom :
          <input class="text" name="nouveauNom1">

        </p>
        <p>
          Confirme le nouveau nom :
          <input class="text" name="nouveauNom2">
        </p>
        <input type="submit" name="modifierNom" value="Valider">
      </form>
    </div>
  </div>
</div>

</div>
