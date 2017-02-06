<?php

require_once 'Controleurs/controleurMembres.php';
require_once 'Controleurs/controleurAdmin.php';
$membre = new controleurMembres();
$admin = new controleurAdmin();
?>

<div class="row row-centered">
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupBannirMembre">Bannir un membre</button>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupMembresBannis">Afficher les membres bannis</button>
  </div>
</div>

<div id="popupBannirMembre" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <p>Membre que tu veux bannir : </p>
        <p><select class="" name="membreABannir">
          <?php foreach ($membresNonBannis as list($prenom, $nom, $id)): ?>
            <option value="<?php echo $id ?>"><?php echo $prenom.' '.$nom ?></option>
          <?php endforeach; ?>
        </select></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="boutonBannirMembre" value="Bannir">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupBannirMembre" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <p>Membres bannis :  </p>
        <?php foreach ($membresBannis as list($prenom, $nom, $id)): ?>
          <option value="<?php echo $id ?>"><?php echo $prenom.' '.$nom ?></option>
          <form class="" action="index.html" method="post">
            <p> <?php echo $prenom.' '.$nom ?> <input class="petitsBoutonsFormulaires" type="submit" name="boutonDebannirMembre" value="Débannir"> </p>
          </form>
        <?php endforeach; ?>
      <p>
        <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
      </p>
    </div>
  </div>
</div>