<?php
  require_once 'Controleurs/controleurGroupes.php';
  require_once 'Controleurs/controleurMembres.php';
  $groupe = new controleurGroupes();
  $membre = new controleurMembres();
  $verificationCreateurGroupe = $groupe->verificationCreateurGroupe();
  $verificationMembreBanniBySession = $membre->verificationMembreBanni($_SESSION['id']);

  if ($verificationMembreBanniBySession == true) {
    $banni = 1;
  }

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

<section class="row row-centered sec sec-bg-img sec-bg-overlay nomPhotoGroupe" style="background-image: url(<?php echo $photoGroupe[0] ?>);">
</section>

<div class="row row-centered nomGroupe">
  <h1> <?php echo $_GET['groupe'] ?> </h1>
</div>

<div class="container">

  <div class="row row-centered playlist">
    <h2>Set-List</h2>
    <?php if ($morceaux): ?>
      <?php foreach ($morceaux as list($morceau, $artiste)): ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 col-centered morceau">
          <p><?php echo $morceau ?></p>
          <p>(<?php echo $artiste ?>)</p>

          <?php if ($g == 0 || $g == 1): ?>
            <form action="" method="post">
              <input type="hidden" name="supprimerMorceau" value="<?php echo $morceau ?>">
              <input type="hidden" name="supprimerArtiste" value="<?php echo $artiste ?>">
              <button type="submit" class="petitsBoutonsFormulaires" name="boutonSupprimerMorceau">Supprimer</button>
            </form>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!$morceaux): ?>
      Le groupe <strong><?php echo $_GET['groupe'] ?></strong> n'a encore ajouté aucun morceau !
    <?php endif; ?>
  </div>

  <div class="row row-centered membresGroupe">
    <h2> Membres </h2>
    <?php foreach ($membres as list($id, $prenom, $nom, $photo)): ?>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-centered membreGroupe">
        <img class="photoGroupeMembre" src="<?php echo $photo ?>" />
        <a href="index.php?page=profil&amp;id=<?php echo $id ?>"> <?php echo $prenom." ".$nom ?></a>
      </div>
    <?php endforeach; ?>
  </div>

  <?php if ($membresInvites): ?>
    <div class="row row-centered">
      <h2>Membres invités</h2>
      <?php foreach ($membresInvites as list($id, $prenom, $nom, $photo)): ?>
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-centered membreGroupe">
          <img class="photoGroupeMembre" src="<?php echo $photo ?>" />
          <a href="index.php?page=profil&amp;id=<?php echo $id ?>"> <?php echo $prenom." ".$nom ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if (($g == 0 || $g == 1) && $banni != 1): ?>
    <div class="row row-centered">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-centered boutonsMembres">
        <h3>Options Membres</h3>
        <?php if ($g == 0 && $banni != 1): ?>
            <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupInviterMembre">Inviter un membre</button>
          <?php if ($membresASupprimer[0][0]): ?>
              <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupSupprimerMembre">Supprimer un membre</button>
          <?php endif; ?>
          <?php if ($autresMembres[0][0]): ?>
              <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupNommerChefGroupe">Désigner un nouveau Chef</button>
          <?php endif; ?>
        <?php endif; ?>
        <?php if ($g == 1 && $banni != 1): ?>
            <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupQuitterGroupe">Quitter le Groupe</button>
        <?php endif; ?>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-centered boutonsGroupe">
        <h3>Options Groupe</h3>
        <?php if ($g == 0 && $banni != 1): ?>
            <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupModifierNom">Modifier le nom du Groupe</button>
            <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupPhotoGroupe">Modifier la photo du Groupe</button>
            <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupSuppressionGroupe">Supprimer le Groupe</button>
        <?php endif; ?>
        <?php if (($g == 0 || $g == 1) && $banni != 1): ?>
            <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupAjouterMorceau">Ajouter un Morceau</button>
        <?php endif; ?>
      </div>
    </div>

  <?php endif; ?>

  <?php if (($g == 0 || $g == 1) && $banni == 1): ?>
    <div class="banni">
      Vous avez été banni. Vous ne pouvez plus interagir avec votre groupe.
    </div>
  <?php endif; ?>

</div>

<div id="popupInviterMembre" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <p>
        Sélectionner le membre à inviter
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
        Sélectionner le membre à supprimer
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
    <div class="modal-content popups">
      <form method="post" action="">
        <p>Nouveau nom pour le groupe : </p>
        <p><input type="text" name="nouveauNom" value="" placeholder="Nom du groupe"></p>
        <input class="boutonsFormulaires" type="submit" name="modifierNom" value="Valider">
        <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
      </form>
    </div>
  </div>
</div>

<div id="popupPhotoGroupe" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="inputContainer">
          <input class="inputFile" id="changerPhotoGroupe" type="file" name="photoGroupe">
          <label for="changerPhotoGroupe" class="label" tabindex="0">Sélectionner un fichier !</label>
        </div>
        <p class="fileReturn"></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="changerPhotoGroupe" value="Changer de photo">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupSuppressionGroupe" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <p>Tu veux vraiment supprimer le groupe <strong><?php echo $_GET['groupe'] ?></strong> ?</p>
      <form action="" method="post" enctype="multipart/form-data">
        <p>
          <input class="boutonsFormulaires" type="submit" name="supprimerGroupe" value="Confirmer la supression">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupNommerChefGroupe" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <p>
        Désigner le nouveau chef du groupe :
      </p>
      <form action="" method="post" enctype="multipart/form-data">
        <p>
          <select class="select" name="membresChefGroupe">
            <?php foreach ($autresMembres as list($id, $prenom, $nom)) { ?>
              <option value = "<?php echo $id ?>" > <?php echo $prenom." ".$nom?> </option>
            <?php } ?>
          </select>
        </p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="changerChefGroupe" value="Confirmer">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupQuitterGroupe" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <p>Voulez-vous vraiment quitter le groupe <strong><?php echo $_GET['groupe'] ?></strong> ?</p>
      <form action="" method="post" enctype="multipart/form-data">
        <p>
          <input class="boutonsFormulaires" type="submit" name="quitterGroupe" value="Confirmer">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupAjouterMorceau" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
          <p>Nom du Morceau :</p>
          <p><input type="text" name="nomMorceau" placeholder="Morceau" value=""></p>
          <p>Artiste :</p>
          <p><input type="text" name="nomArtiste" placeholder="Artiste" value=""></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="ajouterMorceau" value="Ajouter">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="JS/labelsInputFiles.js"></script>
