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
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupValiderMembres">Valider un membre</button>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupSupprimerMembre">Supprimer un membre</button>
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

<div id="popupSupprimerMembre" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <p>Membre que tu veux supprimer : </p>
        <p><select class="" name="membreASupprimer">
          <?php foreach ($membresASupprimer as list($id, $prenom, $nom)): ?>
            <option value="<?php echo $id ?>"><?php echo $prenom.' '.$nom ?></option>
          <?php endforeach; ?>
        </select></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="boutonSupprimerMembre" value="Supprimer">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupMembresBannis" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <p>Membres bannis : </p>

      <?php if (!$membresBannis[0][0]): ?>
        <p> Aucun membre n'a été banni </p>

        <?php else: ?>
          <table class="tableauMembresBannis">
            <?php foreach ($membresBannis as list($prenom, $nom, $id)): ?>
              <form class="" action="" method="post">
                <input type="hidden" name="membreADebannir" value="<?php echo $id ?>">
                <tr>
                  <td style="padding-right:1em; text-align:left;"><?php echo $prenom.' '.$nom ?></td>
                  <td> <input class="petitsBoutonsFormulaires" type="submit" name="boutonDebannirMembre" value="Débannir"> </td>
                </tr>
              </form>
            <?php endforeach; ?>
          </table>
      <?php endif; ?>

      <p> <button id="annuler" type="button" data-dismiss="modal">Annuler</button> </p>
    </div>
  </div>
</div>

<div id="popupValiderMembres" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <?php if ($membresNonValides[0][0]): ?>
        <form action="" method="post" enctype="multipart/form-data">
          <p>Membres à valider :</p>
          <p><select class="" name="membreAValider">
            <?php foreach ($membresNonValides as list($prenom, $nom, $id)): ?>
              <option value="<?php echo $id ?>"><?php echo $prenom.' '.$nom ?></option>
            <?php endforeach; ?>
          </select></p>
          <p>
            <input class="boutonsFormulaires" type="submit" name="boutonValiderMembre" value="Valider l'inscription">
            <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
          </p>
        </form>
      <?php endif; ?>
      <?php if (!$membresNonValides[0][0]): ?>
        <p>Il n'y a pas de memmbre à valider !</p>
        <p>
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      <?php endif; ?>
    </div>
  </div>
</div>
