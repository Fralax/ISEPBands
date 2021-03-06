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
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupNommerAdministrateur">Nommer un administrateur</button>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupSupprimerAdministrateur">Supprimer un administrateur</button>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupSupprimerGroupe">Supprimer un groupe</button>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupAjouterInstrument">Rajouter un instrument</button>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
    <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupSupprimerInstrument">Supprimer un instrument</button>
  </div>
</div>

<div id="popupAjouterInstrument" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="inputContainer">
          <p><input type="text" name="nomInstrument" value="" placeholder="Nom de l'instrument"></p>
          <input class="inputFile" id="ajouterPhotoInstrument" type="file" name="photoInstrument">
          <label for="ajouterPhotoInstrument" class="label" tabindex="0">Sélectionner une photo !</label>
        </div>
        <p class="fileReturn"></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="boutonAjouterInstrument" value="Ajouter un instrument">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
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

<div id="popupSupprimerInstrument" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <p>Instrument que tu veux supprimer : </p>
        <p><select class="" name="instrumentASupprimer">
          <?php foreach ($instruments as list($instrumentASupprimer)): ?>
            <option value="<?php echo $instrumentASupprimer ?>"><?php echo $instrumentASupprimer ?></option>
          <?php endforeach; ?>
        </select></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="boutonSupprimerInstrument" value="Supprimer">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupNommerAdministrateur" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <p>Membre que tu veux nommer administrateur : </p>
        <p><select class="" name="membreANommerAdministrateur">
          <?php foreach ($membresNonBannis as list($prenom, $nom, $id)): ?>
            <option value="<?php echo $id ?>"><?php echo $prenom.' '.$nom ?></option>
          <?php endforeach; ?>
        </select></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="boutonNommerAdministrateur" value="Nommer un Administrateur">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<div id="popupSupprimerAdministrateur" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <?php if (!$membresAdministrateurs[0][0]): ?>
        <p>Il n'y a aucun autre administrateur</p>
      <?php else: ?>
        <form action="" method="post" enctype="multipart/form-data">
          <p>Administrateur à supprimer : </p>
          <p><select class="" name="membreASupprimerAdministrateur">
            <?php foreach ($membresAdministrateurs as list($prenom, $nom, $id)): ?>
              <option value="<?php echo $id ?>"><?php echo $prenom.' '.$nom ?></option>
            <?php endforeach; ?>
          </select></p>
          <p>
            <input class="boutonsFormulaires" type="submit" name="boutonSupprimerAdministrateur" value="Supprimer cet Administrateur">
      <?php endif; ?>
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

<div id="popupSupprimerGroupe" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <p>Groupe que tu veux supprimer : </p>
        <p><select class="" name="groupeASupprimer">
          <?php foreach ($groupes as list($nomGroupe)): ?>
            <option value="<?php echo $nomGroupe ?>"><?php echo $nomGroupe ?></option>
          <?php endforeach; ?>
        </select></p>
        <p>
          <input class="boutonsFormulaires" type="submit" name="boutonSupprimerGroupe" value="Supprimer">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="JS/labelsInputFiles.js"></script>
