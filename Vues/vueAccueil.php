<?php $this->titre = "Accueil" ?>

<?php

require_once 'Controleurs/controleurMembres.php';
$membre = new controleurMembres();
$verificationSessionExiste = $membre->verificationSessionExiste();

if ($verificationSessionExiste == true) {
  $a = 0;
} else{
  $a = 1;
}

?>

<?php if ($a == 0): ?>

  <div class="container">

    <?php if ($invitations): ?>
      <div class="row row-centered notifications">
        <?php foreach ($invitations as list($id, $prenom, $nom, $photo, $groupe)): ?>
          <div class="invitation">
            <img class="photoMembreNotifications" src="<?php echo $photo ?>" alt="" />
            <strong><a href="profil/<?php echo $id ?>"><?php echo $prenom." ".$nom ?></a></strong> vous a invité dans le groupe <strong><a href="groupe/<?php echo urlencode($groupe) ?>"><?php echo $groupe ?></a></strong>
            <form action="" method="post">
              <input type="hidden" name="groupe" value="<?php echo $groupe ?>">
              <input class="boutonsFormulaires" type="submit" name="accepterInvitation" value="Accepter">
              <input class="boutonsFormulaires" type="submit" name="refuserInvitation" value="Refuser">
            </form>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="row row-centered">
      <div class="actus col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div id="titreActus">
          <h4>Actualité de l'association</h4>
        </div>

        <div id="filActus">
          <?php foreach($actus as $actu): ?>
            <div class="actu">
              <div class="actu-dateHeure">
                <?php
                  echo $actu['date'];
                ?>
              </div>
              <div class="actu-contenu">
                <?php if($actu['a_type'] == "creationEvenement"): ?>
                  <p>
                    Le groupe <?php echo $actu['g_nom'] ?> a réservé le local le <?php echo $actu['startDate'] ?> de <?php echo $actu['startHeure'] ?> à <?php echo $actu['endHeure'] ?> !
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "suppressionEvenement"): ?>
                  <p>
                    Le groupe <?php echo $actu['g_nom'] ?> a libéré le local le <?php echo $actu['startDate'] ?> de <?php echo $actu['startHeure'] ?> à <?php echo $actu['endHeure'] ?> !
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "ajoutMorceau"): ?>
                  <p>
                    Le groupe <?php echo $actu['g_nom'] ?> a ajouté un morceau à son répertoire : <?php echo $actu['j_morceau'] ?>, de <?php echo $actu['j_artiste'] ?> !
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "suppressionGroupe"): ?>
                  <p>
                    Le groupe <?php echo $actu['g_nom'] ?> a été supprimé !
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "quitterGroupe"): ?>
                  <p>
                    <?php echo $actu['u_prenom']." ".$actu['u_nom'] ?> a quitté le groupe <?php echo $actu['g_nom'] ?> !
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "rejoindreGroupe"): ?>
                  <p>
                    <?php echo $actu['u_prenom']." ".$actu['u_nom'] ?> a rejoint le groupe <?php echo $actu['g_nom'] ?> !
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "creationGroupe"): ?>
                  <p>
                    <?php echo $actu['u_prenom']." ".$actu['u_nom'] ?> a créé le groupe <?php echo $actu['g_nom'] ?>.
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "debannissement"): ?>
                  <p>
                    <?php echo $actu['u_prenom']." ".$actu['u_nom'] ?> a été débanni !
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "bannissement"): ?>
                  <p>
                    <?php echo $actu['u_prenom']." ".$actu['u_nom'] ?> a été banni ...
                  </p>
                <?php endif; ?>
                <?php if($actu['a_type'] == "inscription"): ?>
                  <p>
                    <?php echo $actu['u_prenom']." ".$actu['u_nom'] ?> s'est inscrit sur le site !
                  </p>
                <?php endif; ?>

              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="plusDAtctualites">
          <button id="boutonplusDAtctualites" class="petitsBoutonsFormulaires" type="button">Charger plus d'actualités</button>
        </div>

      </div>

      <!-- <div class="fb-page col-lg-6 col-md-6 col-sm-6 col-xs-12" data-href="https://www.facebook.com/Isepbands/?fref=ts" data-tabs="timeline" data-width="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Isepbands/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Isepbands/?fref=ts">Isep BANDS</a></blockquote></div> -->

    </div>

  </div>

<?php endif; ?>



<?php if ($a == 1): ?>
  <div class="row row-centered">
    <h1>Bienvenue sur le site d'ISEP Bands !</h1>
    <a href="accueil"><img src="Autres/LogoISEPBands.png" width="294.4" height="192" ></a>
  </div>
<?php endif; ?>

<script src="JS/accueil.js"></script>
