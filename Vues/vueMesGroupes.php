<div class="container">

  <div class="row row-centered">
    <?php for ($i=0; $i<count($listeMembres) ; $i++) { ?>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered groupes">
        <p><a href="index.php?page=groupe&amp;groupe=<?php echo urlencode($groupes[$i][0]) ?>"><img class="photoGroupe" src="<?php echo $groupes[$i][1] ?>" alt="" /></a></p>
        <p><a href="index.php?page=groupe&amp;groupe=<?php echo urlencode($groupes[$i][0]) ?>"> <?php echo $groupes[$i][0]; ?> </a></p>
        <p>
          <?php foreach ($listeMembres[$i] as list($membres) ): ?>
          <?php echo $membres ?>
        <?php endforeach; ?> </p>
      </div>

    <?php } ?>
  <p>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered formulaires">
      <button type="button" class="boutonsFormulaires" data-toggle="modal" data-target="#popupCreerGroupe">Crée un Groupe</button>
    </div>
  </p>
    <div id="popupCreerGroupe" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content popups">
          <?php
            require_once 'Controleurs/controleurGroupes.php';
            $creerGroupe = new controleurGroupes();
            $creerGroupe->creationGroupe();
          ?>
          <form action="" method="post" enctype="multipart/form-data">
            <p>Pour commencer la création de ton groupe, donne lui un nom !</p>
            <p><input type="text" name="nomGroupe" value='' placeholder="Nom"></p>
            <p>
              <input class="boutonsFormulaires" type="submit" name="creerGroupe" value="Créer un nouveau groupe">
              <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
            </p>
          </form>
        </div>
      </div>
    </div>


  </div>
</div>
